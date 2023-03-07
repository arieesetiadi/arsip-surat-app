<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_surat_masuk', function (Blueprint $table) {
            $table->integer('id_surat_masuk')->autoIncrement()->unique();
            $table->integer('id_pengguna');
            $table->string('nomor_urut')->nullable();
            $table->string('nomor_surat_asal')->nullable();
            $table->string('pengirim')->nullable();
            $table->string('penerima')->nullable();
            $table->string('perihal')->nullable();
            $table->string('bagian')->nullable(); // Discuss string | foreignId ?
            $table->string('disposisi')->nullable();
            $table->string('status')->nullable();
            $table->string('sifat')->nullable();
            $table->integer('dibaca')->nullable();
            $table->string('catatan')->nullable();
            $table->dateTime('tanggal_surat_asal')->nullable();
            $table->dateTime('tanggal_diterima')->nullable();
            $table->dateTime('tanggal_ajuan')->nullable();
            $table->dateTime('tanggal_disposisi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_surat_masuk');
    }
}
