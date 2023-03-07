<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class T_SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 't_surat_masuk';
    protected $primaryKey = 'id_surat_masuk';
    protected $guarded = [];

    public $timestamps = false;

    // Relationship
    public function pengguna()
    {
        return $this->belongsTo(T_Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    public function lampiran()
    {
        return $this->hasMany(T_Lampiran::class, 'id_surat', 'id_surat_masuk')->where('jenis', 'Surat Masuk');
    }

    // Methods
    public static function getAll()
    {
        $result = self::with(['pengguna', 'lampiran'])
            ->orderByDesc('id_surat_masuk')->get();

        return $result;
    }

    public static function getNomorUrut()
    {
        $count = self::count();
        $length = 3;
        $result = str_pad($count + 1, $length, '0', STR_PAD_LEFT);
        return $result;
    }
}
