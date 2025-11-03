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
        Schema::create('rekomendasi_lomba', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lomba_id')->required;
            $table->timestamps();

            $table->foreign('lomba_id')->references('id')->on('lomba')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomendasi_lomba');
    }
};
