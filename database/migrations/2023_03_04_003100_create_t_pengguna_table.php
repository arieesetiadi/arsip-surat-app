<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pengguna', function (Blueprint $table) {
            $table->integer('id_pengguna')->autoIncrement()->unique();
            $table->integer('id_jenis_pengguna');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('telepon');
            $table->dateTime('tanggal_dibuat')->nullable();
            $table->dateTime('tanggal_diubah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_pengguna');
    }
}
