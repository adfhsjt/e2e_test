<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrestasiSeeder extends Seeder
{
    public function run(): void
    {
        // Clean up related tables first
        DB::table('prestasi_notes')->delete();
        DB::table('prestasi_mahasiswa')->delete();
        DB::table('pembimbing_prestasi')->delete();
        DB::table('bidang_prestasi')->delete();
        DB::table('prestasi')->delete();

        $prestasiData = [
            // Prestasi DISETUJUI
            [
                'tanggal_pengajuan' => '2025-01-15',
                'judul' => 'Juara 1 International UI/UX Design Championship',
                'tempat' => 'Singapore Design Center',
                'tanggal_mulai' => '2025-02-01',
                'tanggal_selesai' => '2025-02-03',
                'url' => 'https://uiux-intl.org/results',
                'tingkat' => 'internasional',
                'juara' => 1,
                'is_individu' => true,
                'status' => 'disetujui',
                'bidang_id' => 1,
                'mahasiswa_ids' => [1],
                'dosen_ids' => [2],
                'approval_status' => 'disetujui',
                'admin_note' => 'Prestasi sangat membanggakan! Dokumentasi lengkap dan sesuai kriteria.',
            ],
            [
                'tanggal_pengajuan' => '2025-01-20',
                'judul' => 'Juara 2 International Cybersecurity Challenge',
                'tempat' => 'MIT Boston, USA',
                'tanggal_mulai' => '2025-02-15',
                'tanggal_selesai' => '2025-02-17',
                'url' => 'https://cybersec-global.org/winners',
                'tingkat' => 'internasional',
                'juara' => 2,
                'is_individu' => false,
                'status' => 'disetujui',
                'bidang_id' => 2,
                'mahasiswa_ids' => [2, 3],
                'dosen_ids' => [3],
                'approval_status' => 'disetujui',
                'admin_note' => 'Tim kerja yang solid. Prestasi internasional yang luar biasa.',
            ],
            [
                'tanggal_pengajuan' => '2025-02-01',
                'judul' => 'Juara 3 International Programming Olympics',
                'tempat' => 'Online - ACM ICPC World Finals',
                'tanggal_mulai' => '2025-03-01',
                'tanggal_selesai' => '2025-03-03',
                'url' => 'https://icpc.global/results',
                'tingkat' => 'internasional',
                'juara' => 3,
                'is_individu' => false,
                'status' => 'disetujui',
                'bidang_id' => 3,
                'mahasiswa_ids' => [4, 5, 6],
                'dosen_ids' => [4, 5],
                'approval_status' => 'disetujui',
                'admin_note' => 'Pencapaian terbaik dalam bidang programming. Patut diapresiasi.',
            ],

            // Prestasi PENDING (Belum diproses admin)
            [
                'tanggal_pengajuan' => '2025-05-10',
                'judul' => 'Juara 1 Kompetisi Data Science Nasional',
                'tempat' => 'Institut Teknologi Bandung',
                'tanggal_mulai' => '2025-05-20',
                'tanggal_selesai' => '2025-05-22',
                'url' => 'https://datascience.itb.ac.id',
                'tingkat' => 'nasional',
                'juara' => 1,
                'is_individu' => true,
                'status' => 'pending',
                'bidang_id' => 4,
                'mahasiswa_ids' => [7],
                'dosen_ids' => [2],
                'approval_status' => null,
                'admin_note' => null,
            ],
            [
                'tanggal_pengajuan' => '2025-05-15',
                'judul' => 'Juara 2 Business Plan Competition Indonesia',
                'tempat' => 'Universitas Indonesia, Jakarta',
                'tanggal_mulai' => '2025-05-25',
                'tanggal_selesai' => '2025-05-27',
                'url' => 'https://bizplan.ui.ac.id',
                'tingkat' => 'nasional',
                'juara' => 2,
                'is_individu' => false,
                'status' => 'pending',
                'bidang_id' => 5,
                'mahasiswa_ids' => [8, 9],
                'dosen_ids' => [3, 4],
                'approval_status' => null,
                'admin_note' => null,
            ],

            // Prestasi DITOLAK
            [
                'tanggal_pengajuan' => '2025-04-01',
                'judul' => 'Juara 3 Lomba Aplikasi Mobile Regional',
                'tempat' => 'Universitas Gadjah Mada',
                'tanggal_mulai' => '2025-04-15',
                'tanggal_selesai' => '2025-04-17',
                'url' => 'https://mobile.ugm.ac.id',
                'tingkat' => 'regional',
                'juara' => 3,
                'is_individu' => false,
                'status' => 'ditolak',
                'bidang_id' => 3,
                'mahasiswa_ids' => [10, 11],
                'dosen_ids' => [5],
                'approval_status' => 'ditolak',
                'admin_note' => 'Dokumentasi sertifikat tidak lengkap. Mohon lengkapi file sertifikat resmi dan surat tugas.',
            ],
            [
                'tanggal_pengajuan' => '2025-04-10',
                'judul' => 'Juara 2 Lomba Web Design Provinsi',
                'tempat' => 'Semarang Convention Center',
                'tanggal_mulai' => '2025-04-20',
                'tanggal_selesai' => '2025-04-21',
                'url' => null,
                'tingkat' => 'provinsi',
                'juara' => 2,
                'is_individu' => true,
                'status' => 'ditolak',
                'bidang_id' => 1,
                'mahasiswa_ids' => [12],
                'dosen_ids' => [2],
                'approval_status' => 'ditolak',
                'admin_note' => 'Lomba tidak terakreditasi resmi oleh institusi pendidikan. Mohon sertakan bukti penyelenggara yang valid.',
            ],

            // Prestasi lainnya DISETUJUI
            [
                'tanggal_pengajuan' => '2025-03-05',
                'judul' => 'Juara 1 Hackathon Regional Jawa-Bali',
                'tempat' => 'Bali Convention Center',
                'tanggal_mulai' => '2025-03-15',
                'tanggal_selesai' => '2025-03-17',
                'url' => 'https://hackathon.jabar.go.id',
                'tingkat' => 'regional',
                'juara' => 1,
                'is_individu' => false,
                'status' => 'disetujui',
                'bidang_id' => 2,
                'mahasiswa_ids' => [13, 14],
                'dosen_ids' => [3],
                'approval_status' => 'disetujui',
                'admin_note' => 'Hackathon bergengsi dengan peserta dari seluruh Jawa-Bali. Sangat membanggakan.',
            ],
        ];

        // Continue with more prestasi to cover all 20 mahasiswa...
        $additionalPrestasi = [
            [
                'tanggal_pengajuan' => '2025-03-10',
                'judul' => 'Juara 3 Design Thinking Competition Regional',
                'tempat' => 'Universitas Brawijaya, Malang',
                'tanggal_mulai' => '2025-03-20',
                'tanggal_selesai' => '2025-03-22',
                'url' => 'https://designthinking.ub.ac.id',
                'tingkat' => 'regional',
                'juara' => 3,
                'is_individu' => false,
                'status' => 'disetujui',
                'bidang_id' => 1,
                'mahasiswa_ids' => [15, 16],
                'dosen_ids' => [4],
                'approval_status' => 'disetujui',
                'admin_note' => 'Konsep inovasi yang menarik dan implementasi yang baik.',
            ],
            [
                'tanggal_pengajuan' => '2025-03-15',
                'judul' => 'Juara 1 Lomba Inovasi Digital Jawa Tengah',
                'tempat' => 'Semarang Innovation Hub',
                'tanggal_mulai' => '2025-03-25',
                'tanggal_selesai' => '2025-03-26',
                'url' => null,
                'tingkat' => 'provinsi',
                'juara' => 1,
                'is_individu' => true,
                'status' => 'disetujui',
                'bidang_id' => 4,
                'mahasiswa_ids' => [17],
                'dosen_ids' => [5],
                'approval_status' => 'disetujui',
                'admin_note' => 'Inovasi digital yang sangat aplikatif untuk masyarakat.',
            ],
            [
                'tanggal_pengajuan' => '2025-04-05',
                'judul' => 'Juara 2 Startup Pitch Competition Jateng',
                'tempat' => 'Gedung Gradhika Bhakti Praja, Semarang',
                'tanggal_mulai' => '2025-04-15',
                'tanggal_selesai' => '2025-04-16',
                'url' => 'https://startup.jatengprov.go.id',
                'tingkat' => 'provinsi',
                'juara' => 2,
                'is_individu' => false,
                'status' => 'disetujui',
                'bidang_id' => 5,
                'mahasiswa_ids' => [18, 19],
                'dosen_ids' => [2],
                'approval_status' => 'disetujui',
                'admin_note' => 'Ide bisnis yang inovatif dengan potensi pasar yang besar.',
            ],
            [
                'tanggal_pengajuan' => '2025-04-20',
                'judul' => 'Juara 3 Lomba Poster Digital Nasional',
                'tempat' => 'Universitas Diponegoro, Semarang',
                'tanggal_mulai' => '2025-05-01',
                'tanggal_selesai' => '2025-05-02',
                'url' => 'https://poster.undip.ac.id',
                'tingkat' => 'nasional',
                'juara' => 3,
                'is_individu' => true,
                'status' => 'disetujui',
                'bidang_id' => 1,
                'mahasiswa_ids' => [20],
                'dosen_ids' => [3],
                'approval_status' => 'disetujui',
                'admin_note' => 'Desain poster yang kreatif dan pesan yang disampaikan sangat efektif.',
            ],
        ];

        $allPrestasi = array_merge($prestasiData, $additionalPrestasi);

        foreach ($allPrestasi as $index => $prestasi) {
            $prestasiId = $index + 1;

            // Insert prestasi
            DB::table('prestasi')->insert([
                'tanggal_pengajuan' => $prestasi['tanggal_pengajuan'],
                'judul' => $prestasi['judul'],
                'tempat' => $prestasi['tempat'],
                'tanggal_mulai' => $prestasi['tanggal_mulai'],
                'tanggal_selesai' => $prestasi['tanggal_selesai'],
                'url' => $prestasi['url'],
                'tingkat' => $prestasi['tingkat'],
                'juara' => $prestasi['juara'],
                'is_individu' => $prestasi['is_individu'],
                'status' => $prestasi['status'],
                'foto_kegiatan' => 'foto_kegiatan_' . $prestasiId . '.jpg',
                'nomor_surat_tugas' => 'ST/' . str_pad($prestasiId, 3, '0', STR_PAD_LEFT) . '/2025',
                'tanggal_surat_tugas' => '2025-01-' . str_pad(min($prestasiId, 12), 2, '0', STR_PAD_LEFT),
                'file_surat_tugas' => 'surat_tugas_' . $prestasiId . '.pdf',
                'file_sertifikat' => 'sertifikat_' . $prestasiId . '.pdf',
                'file_poster' => 'poster_' . $prestasiId . '.jpg',
                'is_akademik' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert bidang_prestasi
            DB::table('bidang_prestasi')->insert([
                'bidang_id' => $prestasi['bidang_id'],
                'prestasi_id' => $prestasiId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert prestasi_mahasiswa
            foreach ($prestasi['mahasiswa_ids'] as $mahasiswaId) {
                DB::table('prestasi_mahasiswa')->insert([
                    'prestasi_id' => $prestasiId,
                    'mahasiswa_id' => $mahasiswaId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Insert pembimbing_prestasi
            foreach ($prestasi['dosen_ids'] as $dosenId) {
                DB::table('pembimbing_prestasi')->insert([
                    'prestasi_id' => $prestasiId,
                    'dosen_id' => $dosenId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Insert prestasi_notes (hanya jika sudah ada keputusan admin)
            if ($prestasi['approval_status']) {
                DB::table('prestasi_notes')->insert([
                    'prestasi_id' => $prestasiId,
                    'dosen_id' => 1, // Admin (ID 1)
                    'status' => $prestasi['approval_status'],
                    'note' => $prestasi['admin_note'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
