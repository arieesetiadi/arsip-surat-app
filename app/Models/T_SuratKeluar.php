<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 't_surat_keluar';
    protected $primaryKey = 'id_surat_keluar';
    protected $guarded = [];

    public $timestamps = false;

    // Relationship
    public function pengguna()
    {
        return $this->belongsTo(T_Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    public function lampiran()
    {
        return $this
            ->hasMany(T_Lampiran::class, 'id_surat', 'id_surat_keluar')
            ->where('jenis', 'Surat Keluar');
    }

    // Methods
    public static function getAll()
    {
        $result = self
            ::with(['pengguna', 'lampiran'])
            ->orderByDesc('id_surat_keluar')
            ->get();

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
