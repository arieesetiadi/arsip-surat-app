<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function viewLogin()
    {
        return view('login');
    }

    // Lakukan proses login
    public function doLogin(Request $request)
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

    // Fungsi edit profile
    public function updateProfile(UpdateRequest $request){
        $profileData = $request->data();
        $userId = auth()->user()->id;
        $updated = User::find($userId)->update($profileData);

        // Munculkan pesan error jika update gagal
        if(!$updated){
            $alertData['type'] = 'danger';
            $alertData['message'] = 'Profile anda gagal dirubah.';
            return back()->with('alert', $alertData);
        }

        // Munculkan pesan succes jika update berhasil
        $alertData['type'] = 'success';
        $alertData['message'] = 'Profile anda berhasil dirubah.';
        return back()->with('alert', $alertData);
    }
}
