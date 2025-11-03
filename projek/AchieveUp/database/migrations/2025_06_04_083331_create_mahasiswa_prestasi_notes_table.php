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
        Schema::create('mahasiswa_prestasi_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id')->required();
            $table->unsignedBigInteger('prestasi_notes_id')->required();
            $table->boolean('is_accepted')->default(false);
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('prestasi_notes_id')->references('id')->on('prestasi_notes')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_prestasi_notes');
    }
};
