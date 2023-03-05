<?php

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
