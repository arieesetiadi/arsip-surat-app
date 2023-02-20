<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    // Halaman utama kelola pengguna
    public function index()
    {
        $viewData['headTitle'] = 'Pengguna';
        $viewData['users'] = User::orderByDesc('id')->get();
        return view('pages.users.index')->with($viewData);
    }

    // Halaman detail pengguna
    public function show($id)
    {
        $viewData['headTitle'] = 'Detail Pengguna';
        $viewData['user'] = User::find($id);
        return view('pages.users.show')->with($viewData);
    }

    // Halaman tambah pengguna
    public function create()
    {
        $viewData['headTitle'] = 'Tambah Pengguna';
        return view('pages.users.create')->with($viewData);
    }

    // Halaman edit pengguna
    public function edit($id)
    {
        $viewData['headTitle'] = 'Edit Pengguna';
        $viewData['user'] = User::find($id);
        return view('pages.users.edit')->with($viewData);
    }

    // Fungsi tambah pengguna baru
    public function store(StoreRequest $request){
        $userData = $request->data();
        $created = User::create($userData);

        // Munculkan pesan error jika insert gagal
        if(!$created){
            $alertData['type'] = 'danger';
            $alertData['message'] = 'Data pengguna gagal ditambah.';
            return redirect()->route('users.index')->with('alert', $alertData);
        }

        // Munculkan pesan succes jika insert berhasil
        $alertData['type'] = 'success';
        $alertData['message'] = 'Data pengguna berhasil ditambah.';
        return redirect()->route('users.index')->with('alert', $alertData);
    }

    // Fungsi update data pengguna
    public function update(UpdateRequest $request, $id){
        $userData = $request->data();
        $updated = User::find($id)->update($userData);

        // Munculkan pesan error jika update gagal
        if(!$updated){
            $alertData['type'] = 'danger';
            $alertData['message'] = 'Data pengguna gagal diubah.';
            return redirect()->route('users.index')->with('alert', $alertData);
        }

        // Munculkan pesan succes jika update berhasil
        $alertData['type'] = 'success';
        $alertData['message'] = 'Data pengguna berhasil diubah.';
        return redirect()->route('users.index')->with('alert', $alertData);
    }

    // Fungsi hapus pengguna
    public function destroy($id){
        $deleted = User::find($id)->delete();

        // Munculkan pesan error jika delete gagal
        if(!$deleted){
            $alertData['type'] = 'danger';
            $alertData['message'] = 'Data pengguna gagal dihapus.';
            return redirect()->route('users.index')->with('alert', $alertData);
        }

        // Munculkan pesan succes jika delete berhasil
        $alertData['type'] = 'success';
        $alertData['message'] = 'Data pengguna berhasil dihapus.';
        return redirect()->route('users.index')->with('alert', $alertData);
    }
}
