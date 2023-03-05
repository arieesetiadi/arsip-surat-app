<?php

use App\Models\T_SuratMasuk;
use Illuminate\Support\Str;

function pengguna()
{
    return auth()->user();
}

function isAdmin()
{
    return pengguna()->jenis_pengguna->nama == 'Admin Officer';
}

function isDirektur()
{
    return pengguna()->jenis_pengguna->nama == 'Direktur BUMDes';
}

function str($string){
    return Str::of($string);
}

function generateNomorUrut(){
    $countSuratMasuk = T_SuratMasuk::count();
    $countLength = 3;
    $result = str_pad($countSuratMasuk + 1, $countLength, '0', STR_PAD_LEFT);
    return $result;
}


