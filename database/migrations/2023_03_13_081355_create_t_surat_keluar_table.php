<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSuratKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_surat_keluar', function (Blueprint $table) {
            $table->integer('id_surat_keluar')->autoIncrement()->unique();
            $table->integer('id_pengguna');
            $table->string('nomor_urut')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->string('pengirim')->nullable();
            $table->string('penerima')->nullable();
            $table->string('perihal')->nullable();
            $table->string('bagian')->nullable(); // Discuss string | foreignId ?
            $table->dateTime('tanggal_surat')->nullable();
            $table->dateTime('tanggal_dikirim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_surat_keluar');
    }
}
