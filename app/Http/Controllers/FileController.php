<?php

namespace App\Http\Controllers;

class FileController extends Controller
{
    public static function upload($file, $path){
        $extension = '.' . $file->extension();
        $prefix = now()->toDatestring() . '-SM-' . uniqid(10);
        $fileName =  $prefix .  $extension;

        $path = base_path($path);
        $result = $file->move($path, $fileName);

        return $result->getFileName();
    }
}
