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
            return back()->with('alert', 'Username atau password anda tidak valid.');
        }

        // Redirect ke halaman dashboard
        return redirect()->route('dashboard');
    }

    // Fungsi logout
    public function doLogout(){
        auth()->logout();
        return redirect()->route('viewLogin');
    }

    // Tampilkan halaman profile
    public function viewProfile(){
        $viewData = [
            'headTitle' => 'Profile'
        ];
        return view('pages.profile')->with($viewData);
    }
}
