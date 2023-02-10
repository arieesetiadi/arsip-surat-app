<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function viewLogin()
    {
        return view('login');
    }

    // Lakukan proses login
    public function doLogin(Request $data)
    {
        // Ambil data dari form login
        $loginData = $data->only('username', 'password');
        $rememberMe = $data->rememberMe == 'on' ? true : false;

        // Lakukan proses login
        $result = auth()->attempt($loginData, $rememberMe);

        // Cek hasil proses login
        if(!$result){
            return back()->with('alert', 'Username atau password tidak valid');
        }

        // Redirect ke halaman dashboard
        return redirect()->route('dashboard');
    }
}
