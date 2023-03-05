<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pengguna\StoreRequest;
use App\Http\Requests\Pengguna\UpdateProfileRequest;
use App\Http\Requests\Pengguna\UpdateRequest;
use App\Models\T_JenisPengguna;
use App\Models\T_Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Pengguna';
        $data['pengguna'] = T_Pengguna::with('jenis_pengguna')->orderByDesc('id_pengguna')->get();
        return view('pages.pengguna.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Pengguna';
        $data['jenis_pengguna'] = T_JenisPengguna::all();
        return view('pages.pengguna.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $pengguna = $request->data();
        $result = T_Pengguna::create($pengguna);

        // Munculkan pesan error jika insert gagal
        if (!$result) {
            $alert['type'] = 'danger';
            $alert['message'] = 'Data pengguna gagal ditambah.';
            return redirect()->route('pengguna.index')->with('alert', $alert);
        }

        // Munculkan pesan succes jika insert berhasil
        $alert['type'] = 'success';
        $alert['message'] = 'Data pengguna berhasil ditambah.';
        return redirect()->route('pengguna.index')->with('alert', $alert);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Detail Pengguna';
        $data['pengguna'] = T_Pengguna::find($id);
        return view('pages.pengguna.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Edit Pengguna';
        $data['pengguna'] = T_Pengguna::find($id);
        $data['jenis_pengguna'] = T_JenisPengguna::all();
        return view('pages.pengguna.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $pengguna = $request->data();
        $result = T_Pengguna::find($id)->update($pengguna);

        // Munculkan pesan error jika update gagal
        if (!$result) {
            $alert['type'] = 'danger';
            $alert['message'] = 'Data pengguna gagal diubah.';
            return redirect()->route('pengguna.index')->with('alert', $alert);
        }

        // Munculkan pesan succes jika update berhasil
        $alert['type'] = 'success';
        $alert['message'] = 'Data pengguna berhasil diubah.';
        return redirect()->route('pengguna.index')->with('alert', $alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = T_Pengguna::find($id)->delete();

        // Munculkan pesan error jika delete gagal
        if (!$result) {
            $alert['type'] = 'danger';
            $alert['message'] = 'Data pengguna gagal dihapus.';
            return redirect()->route('pengguna.index')->with('alert', $alert);
        }

        // Munculkan pesan succes jika delete berhasil
        $alert['type'] = 'success';
        $alert['message'] = 'Data pengguna berhasil dihapus.';
        return redirect()->route('pengguna.index')->with('alert', $alert);
    }

    // Tampilkan halaman profile
    public function profileView(){
        $data['title'] = 'Profile';
        return view('pages.pengguna.profile')->with($data);
    }

    // Fungsi edit profile
    public function profileUpdate(UpdateProfileRequest $request){
        $pengguna = $request->data();
        $idPengguna = pengguna()->id_pengguna;
        $result =T_Pengguna::find($idPengguna)->update($pengguna);

        // Munculkan pesan error jika update gagal
        if(!$result){
            $alert['type'] = 'danger';
            $alert['message'] = 'Profile anda gagal diubah.';
            return back()->with('alert', $alert);
        }

        // Munculkan pesan succes jika update berhasil
        $alert['type'] = 'success';
        $alert['message'] = 'Profile anda berhasil diubah.';
        return back()->with('alert', $alert);
    }
}
