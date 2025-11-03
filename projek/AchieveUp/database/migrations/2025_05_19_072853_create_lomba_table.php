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
        Schema::create('lomba', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->required();
            $table->string('tempat')->required();
            $table->string('tanggal_daftar')->required();
            $table->string('tanggal_daftar_terakhir')->required();
            $table->string('url')->nullable();
            $table->enum('tingkat', ['nasional', 'internasional', 'regional', 'provinsi'])->required();
            $table->boolean('is_individu')->default(true);
            $table->boolean('is_active')->default(true);;
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
        Schema::dropIfExists('lomba');
    }
};
