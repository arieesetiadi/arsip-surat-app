<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 't_surat_masuk';
    protected $primaryKey = 'id_surat_masuk';
    protected $guarded = [];

    public $timestamps = false;
}