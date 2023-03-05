<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_Lampiran extends Model
{
    use HasFactory;

    protected $table = 't_lampiran';
    protected $primaryKey = 'id_lampiran';
    protected $guarded = [];

    public $timestamps = false;
}
