@extends('dosen.layouts.app')
@section('title', 'Detail Rekomendasi')
@section('content')

    <div class="container mx-auto p-6 max-w-2xl">
        <div class="bg-white rounded shadow p-6 mb-6">
            <h2 class="text-xl font-bold mb-2">Info Lomba</h2>
            <table class="w-full text-sm mb-2">
                <tr>
                    <td class="font-semibold w-40">Judul</td>
                    <td>: {{ $rekomendasi->lomba->judul ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Tempat</td>
                    <td>: {{ $rekomendasi->lomba->tempat ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Periode</td>
                    <td>:
                        @if ($rekomendasi->lomba)
                            {{ \Carbon\Carbon::parse($rekomendasi->lomba->tanggal_daftar)->format('d M Y') }}
                            s.d.
                            {{ \Carbon\Carbon::parse($rekomendasi->lomba->tanggal_daftar_terakhir)->format('d M Y') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold">Tingkat</td>
                    <td>: {{ ucfirst($rekomendasi->lomba->tingkat ?? '-') }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Bidang</td>
                    <td>:
                        @if ($rekomendasi->lomba && $rekomendasi->lomba->bidang->count())
                            @foreach ($rekomendasi->lomba->bidang as $b)
                                <span
                                    class="inline-block bg-blue-100 text-blue-800 text-xs font-medium mr-1 px-2 py-0.5 rounded">{{ $b->nama }}</span>
                            @endforeach
                        @else
                            -
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <div class="bg-white rounded shadow p-6 mb-6">
            <h2 class="text-xl font-bold mb-2">Mahasiswa Direkomendasikan</h2>
            <ul class="list-disc pl-5">
                @forelse($mahasiswa as $m)
                    <li>
                        {{ $m->mahasiswa->nama ?? '-' }} ({{ $m->mahasiswa->nim ?? '-' }})
                    </li>
                @empty
                    <li class="text-gray-500">Tidak ada mahasiswa direkomendasikan.</li>
                @endforelse
            </ul>
        </div>

        <div class="bg-white rounded shadow p-6">
            <h2 class="text-xl font-bold mb-2">Dosen Pembimbing</h2>
            <ul class="list-disc pl-5">
                @forelse($dosen as $d)
                    <li>
                        {{ $d->dosen->nama ?? '-' }} ({{ $d->dosen->nidn ?? '-' }})
                    </li>
                @empty
                    <li class="text-gray-500">Tidak ada dosen pembimbing.</li>
                @endforelse
            </ul>
        </div>

        <div class="mt-6 flex space-x-3">
            <a href="{{ url('dosen_pembimbing/notifikasi') }}"
                class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                Kembali
            </a>
            <button type="button" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition btn-hapus"
                data-id="{{ $dosenRekom->id }}" data-type="lomba">
                Hapus
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $(document).on('click', '.btn-hapus', function() {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Yakin hapus data ini?',
                    text: "Data yang dihapus tidak bisa dikembalikan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/dosen_pembimbing/notifikasi/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire('Berhasil!', response.message, 'success')
                                    .then(() => {
                                        window.location.href =
                                            "{{ url('dosen_pembimbing/notifikasi') }}";
                                    });
                            },
                            error: function(xhr) {
                                Swal.fire('Gagal!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
