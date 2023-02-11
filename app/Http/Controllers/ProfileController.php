<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateRequest;

class ProfileController extends Controller
{
    // Tampilkan halaman profile
    public function index(){
        $viewData['headTitle'] = 'Profile';
        return view('pages.profile.index')->with($viewData);
    }

    // Fungsi edit profile
    public function update(UpdateRequest $request){
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
