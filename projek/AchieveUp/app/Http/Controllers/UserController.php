<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->type === 'mahasiswa') {
                $mahasiswas = Mahasiswa::all();
                return response()->json(['data' => $mahasiswas]);
            } elseif ($request->type === 'dosen') {
                $dosens = Dosen::all();
                return response()->json(['data' => $dosens]);
            }
        }

        $breadcrumb = (object) [
            'title' => 'Manajemen Pengguna',
            'list' => ['Home', 'Manajemen Pengguna'],
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem',
        ];

        $activeMenu = 'users';

        return view('admin.users.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function getMahasiswaData()
    {
        $mahasiswas = Mahasiswa::with('programStudi')->get();

        $data = $mahasiswas->map(function ($mhs) {
            return [
                'id' => $mhs->id,
                'nim' => $mhs->nim,
                'nama' => $mhs->nama,
                'username' => $mhs->username,
                'email' => $mhs->email,
                'program_studi' => $mhs->programStudi->nama ?? '-',
            ];
        });

        return response()->json($data);
    }

    public function destroyMahasiswa($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        $mahasiswa->delete();
        return response()->json(['success' => 'Mahasiswa berhasil dihapus']);
    }

    public function getDosenData()
    {
        $dosens = Dosen::all();

        $data = $dosens->map(function ($dsn) {
            return [
                'id' => $dsn->id,
                'nidn' => $dsn->nidn,
                'nama' => $dsn->nama,
                'username' => $dsn->username,
                'email' => $dsn->email,
                'role' => $dsn->role,
            ];
        });

        return response()->json($data);
    }

    public function destroyDosen($id)
    {
        $dosen = Dosen::find($id);
        if (!$dosen) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        $dosen->delete();
        return response()->json(['success' => 'Dosen berhasil dihapus']);
    }

    public function create(Request $request)
    {
        $type = $request->query('type', 'mahasiswa');

        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah User'],
        ];

        $page = (object) [
            'title' => 'Tambah user baru',
        ];

        $programStudis = ProgramStudi::all();

        $activeMenu = 'users';

        return view('admin.users.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'programStudis' => $programStudis,
            'activeMenu' => $activeMenu,
            'type' => $type,
        ]);
    }

    public function store(Request $request)
    {
        $type = $request->input('type');

        if (!is_dir(public_path('foto_mahasiswa'))) {
            mkdir(public_path('foto_mahasiswa'), 0777, true);
        }
        if (!is_dir(public_path('foto_dosen'))) {
            mkdir(public_path('foto_dosen'), 0777, true);
        }

        if ($type == 'mahasiswa') {
            $request->validate([
                'nim' => 'required|unique:mahasiswa,nim',
                'nama' => 'required|string|max:255',
                'username' => 'required|string|max:100',
                'email' => 'required|email|unique:mahasiswa,email',
                'password' => 'required|min:6|confirmed',
                'program_studi_id' => 'required|exists:program_studi,id',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $password = Hash::make($request->password);

            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('foto_mahasiswa'), $filename);
                $fotoPath = 'foto_mahasiswa/' . $filename;
            }

            Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $password,
                'program_studi_id' => $request->program_studi_id,
                'foto' => $fotoPath,
            ]);

            return redirect()->route('admin.users.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
        }

        if ($type == 'dosen') {
            $request->validate([
                'nidn' => 'required|unique:dosen,nidn',
                'username' => 'required|string|max:100',
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:dosen,email',
                'password' => 'required|min:6|confirmed',
                'role' => 'required|in:admin,kajur',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $password = Hash::make($request->password);

            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('foto_dosen'), $filename);
                $fotoPath = 'foto_dosen/' . $filename;
            }

            Dosen::create([
                'nidn' => $request->nidn,
                'username' => $request->username,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $password,
                'foto' => $fotoPath,
                'role' => $request->role,
            ]);

            return redirect()->route('admin.users.index')->with('success', 'Data dosen berhasil ditambahkan!');
        }

        return back()->with('error', 'Tipe user tidak valid')->withInput();
    }

    public function showUpdateMahasiswaForm($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $programStudis = ProgramStudi::all();

        $breadcrumb = (object) [
            'title' => 'Update Mahasiswa',
            'list' => ['Home', 'User', 'Update'],
        ];

        $page = (object) [
            'title' => 'Update data mahasiswa',
        ];

        $activeMenu = 'users';

        return view('admin.users.updatemahasiswa', compact(
            'breadcrumb',
            'page',
            'programStudis',
            'activeMenu',
            'mahasiswa'
        ));
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswa,nim,' . $id,
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:mahasiswa,username,' . $id,
            'email' => 'required|email|unique:mahasiswa,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
            'program_studi_id' => 'required|exists:program_studi,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = $mahasiswa->foto;

        if ($request->hasFile('foto')) {
            if ($fotoPath && file_exists(public_path($fotoPath))) {
                unlink(public_path($fotoPath));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto_mahasiswa'), $filename);
            $fotoPath = 'foto_mahasiswa/' . $filename;
        }

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $mahasiswa->password,
            'program_studi_id' => $request->program_studi_id,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Data mahasiswa berhasil di-update!');
    }

    public function showUpdateDosenForm($id)
    {
        $dosen = Dosen::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Update Dosen',
            'list' => ['Home', 'User', 'Update'],
        ];

        $page = (object) [
            'title' => 'Update data dosen',
        ];

        $activeMenu = 'users';

        return view('admin.users.updatedosen', compact(
            'breadcrumb',
            'page',
            'activeMenu',
            'dosen'
        ));
    }

    public function updateDosen(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $request->validate([
            'nidn' => 'required|string|max:20|unique:dosen,nidn,' . $id,
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:dosen,username,' . $id,
            'email' => 'required|email|unique:dosen,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required|in:admin,kajur,dosen pembimbing',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = $dosen->foto;

        if ($request->hasFile('foto')) {
            if ($fotoPath && file_exists(public_path($fotoPath))) {
                unlink(public_path($fotoPath));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto_dosen'), $filename);
            $fotoPath = 'foto_dosen/' . $filename;
        }

        $dosen->update([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $dosen->password,
            'role' => $request->role,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Data dosen berhasil di-update!');
    }

    public function showMahasiswa($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Detail Mahasiswa',
            'list' => ['Home', 'User', 'Detail'],
        ];

        $page = (object) [
            'title' => 'Detail data mahasiswa',
        ];

        $activeMenu = 'users';

        return view('admin.users.detailmahasiswa', compact(
            'breadcrumb',
            'page',
            'activeMenu',
            'mahasiswa'
        ));
    }

    public function showDosen($id)
    {
        $dosen = Dosen::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Detail Dosen',
            'list' => ['Home', 'User', 'Detail'],
        ];

        $page = (object) [
            'title' => 'Detail data dosen',
        ];

        $activeMenu = 'users';

        return view('admin.users.detaildosen', compact(
            'breadcrumb',
            'page',
            'activeMenu',
            'dosen'
        ));
    }
}
