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
        Schema::create('pengajuan_lomba_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lomba_id'); 
            $table->unsignedBigInteger('mahasiswa_id'); 
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('notes')->nullable(); 
            $table->unsignedBigInteger('admin_id')->nullable(); 
            $table->timestamps();

            $table->foreign('lomba_id')->references('id')->on('lomba')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('dosen')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_lomba_mahasiswa');
    }
};
