<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_pengajuan')->required();
            $table->string('judul')->required();
            $table->string('tempat')->required();
            $table->string('tanggal_mulai')->required();
            $table->string('tanggal_selesai')->required();
            $table->string('url')->nullable();
            $table->enum('tingkat', ['nasional', 'internasional', 'regional', 'provinsi'])->required();
            $table->enum('juara', [1, 2, 3])->required();
            $table->boolean('is_individu')->default(true);
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->string('foto_kegiatan')->nullable();
            $table->string('nomor_surat_tugas')->required();
            $table->string('tanggal_surat_tugas')->required();
            $table->string('file_surat_tugas')->required();
            $table->string('file_sertifikat')->required();
            $table->string('file_poster')->nullable();
            $table->boolean('is_akademik')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
