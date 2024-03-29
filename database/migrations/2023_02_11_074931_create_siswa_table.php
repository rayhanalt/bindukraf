<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nis')->unique();
            $table->bigInteger('nisn')->unique();
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('agama');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('kewarganegaraan');
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara_kandung')->nullable();
            $table->integer('jumlah_saudara_angkat')->nullable();
            $table->integer('jumlah_saudara_tiri')->nullable();
            $table->string('yatim_piatu')->nullable();
            $table->string('bahasa');
            $table->string('jenis_kelamin');
            $table->string('no_telp');
            $table->string('kode_tahun_ajaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
