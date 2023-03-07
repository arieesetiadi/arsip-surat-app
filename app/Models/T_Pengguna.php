<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class T_Pengguna extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 't_pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $guarded = [];
    protected $hidden = ['password'];

    public $timestamps = false;

    // Relationship
    public function jenisPengguna(){
        return $this->hasOne(T_JenisPengguna::class, 'id_jenis_pengguna', 'id_jenis_pengguna');
    }
}
