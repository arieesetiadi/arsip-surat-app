<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function login()
    {
        return view('login');
    }

    // Lakukan proses login
    public function authenticate(Request $request)
    {
        // Ambil data dari form login
        $loginData = $request->only('username', 'password');
        $rememberMe = $request->rememberMe == 'on' ? true : false;

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
    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
