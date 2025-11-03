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
        Schema::create('profil_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->double('pengalaman_organisasi')->default(0);
            $table->double('skor_toffle')->default(0);
            $table->string('file_toefl')->nullable();
            $table->integer('semester')->default(1);
            $table->boolean('is_active')->default(true);
            $table->double('ips')->default(0);
            $table->string('file_ska_organisasi')->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_mahasiswa');
    }
};
