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
        Schema::create('pasienns', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->integer('umur');
            $table->string('jenis_kelamin');
            $table->text('diagnosa');
            $table->timestamp('waktu_kedatangan')->nullable();
            $table->string('lama_kunjungan'); // Mengubah tipe data menjadi string
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasienns');
    }
};
