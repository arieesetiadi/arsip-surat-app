<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

function pengguna()
{
    return auth()->user();
}

function isAdmin()
{
    return pengguna()->jenisPengguna->nama == 'Admin Officer';
}

function isDirektur()
{
    return pengguna()->jenisPengguna->nama == 'Direktur BUMDes';
}

function str($string){
    return Str::of($string);
}

function humanDateFormat($date){
    $carbon = Carbon::make($date)->settings(['formatFunction' => 'translatedFormat']);
    $date = $carbon->format('l, j F Y');
    return $date;
}

function formDateFormat($date){
    $carbon = Carbon::make($date)->settings(['formatFunction' => 'translatedFormat']);
    $date = $carbon->toDateString();
    return $date;
}
