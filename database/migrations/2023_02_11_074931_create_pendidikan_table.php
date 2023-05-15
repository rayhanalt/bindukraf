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
        Schema::create('pendidikan_sebelum', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nis')->unique();
            $table->string('sekolah_asal')->nullable();
            $table->string('tanggal_ijazah')->nullable();
            $table->string('nomor_ijazah')->nullable();
            $table->string('lama_belajar')->nullable();
            $table->string('dari_sekolah')->nullable();
            $table->string('alasan')->nullable();
            $table->string('di_kelas')->nullable();
            $table->string('kelompok')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('tanggal')->nullable();
            $table->boolean('kumpul_ijazah')->nullable();
            $table->boolean('kumpul_akte')->nullable();
            $table->boolean('kumpul_kk')->nullable();
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
        Schema::dropIfExists('pendidikan_sebelum');
    }
};
