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
        // Schema::create('t_surat_masuk', function (Blueprint $table) {
        //     $table->integer('id_surat_masuk')->autoIncrement()->unique();
        //     $table->integer('nomor_urut');
        //     $table->string('nomor_surat_asal');
        //     $table->string('pengirim');
        //     $table->string('penerima');
        //     $table->string('perihal');
        //     $table->integer('id_pengguna');
        //     $table->string('bagian'); // Discuss string | foreignId ?
        //     $table->string('disposisi');
        //     $table->string('sifat');
        //     $table->integer('dibaca');
        //     $table->string('catatan');
        //     $table->dateTime('tanggal_surat_asal');
        //     $table->dateTime('tanggal_diterima');
        //     $table->dateTime('tanggal_ajuan');
        //     $table->dateTime('tanggal_disposisi');
        // });
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
