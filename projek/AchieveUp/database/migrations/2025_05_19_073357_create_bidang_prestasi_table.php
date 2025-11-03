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
        Schema::create('bidang_prestasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bidang_id');
            $table->unsignedBigInteger('prestasi_id');
            $table->timestamps();

            $table->foreign('bidang_id')->references('id')->on('bidang')->onDelete('cascade');
            $table->foreign('prestasi_id')->references('id')->on('prestasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidang_prestasi');
    }
};
