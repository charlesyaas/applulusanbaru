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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kabkota_id');
            $table->unsignedBigInteger('jenjang_id');
            $table->integer('npsn')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('orang_tua')->nullable();
            $table->string('nama_peserta')->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->integer('tahun_lulus')->nullable();
            $table->string('nomor_ujian')->nullable();
            $table->string('nomor_ijazah')->nullable();
            $table->integer('nisn')->nullable();
            $table->timestamps();

            // Define foreign keys
            $table->foreign('kabkota_id')->references('id')->on('kabkotas')->onDelete('cascade');
            $table->foreign('jenjang_id')->references('id')->on('jenjangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
