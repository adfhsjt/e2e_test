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
        Schema::create('mahasiswa_rekomendasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rekomendasi_lomba_id')->required();
            $table->unsignedBigInteger('mahasiswa_id')->required();
            $table->boolean('is_accepted')->default(false);
            $table->string('note', 100)->nullable();
            $table->timestamps();

            $table->foreign('rekomendasi_lomba_id')->references('id')->on('rekomendasi_lomba')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_rekomendasi');
    }
};
