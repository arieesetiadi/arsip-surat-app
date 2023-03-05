<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_JenisPengguna extends Model
{
    use HasFactory;

    protected $table = 't_jenis_pengguna';
    protected $primaryKey = 'id_jenis_pengguna';
    protected $guarded = [];

    public $timestamps = false;
}
