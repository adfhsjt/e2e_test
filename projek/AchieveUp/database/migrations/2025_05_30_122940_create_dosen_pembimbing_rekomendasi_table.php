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
        Schema::create('dosen_pembimbing_rekomendasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rekomendasi_lomba_id')->required();
            $table->unsignedBigInteger('dosen_id')->required();
            $table->boolean('is_accepted')->default(false);
            $table->string('note', 200)->nullable();
            $table->timestamps();

            $table->foreign('rekomendasi_lomba_id')->references('id')->on('rekomendasi_lomba')->onDelete('cascade');
            $table->foreign('dosen_id')->references('id')->on('dosen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_pembimbing_rekomendasi');
    }
};
