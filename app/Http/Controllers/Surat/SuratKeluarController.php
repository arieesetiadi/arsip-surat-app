<?php

namespace App\Http\Controllers\Surat;

use App\Models\T_Lampiran;
use App\Models\T_SuratMasuk;
use App\Models\T_SuratKeluar;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
use App\Http\Requests\SuratKeluar\StoreRequest;
use App\Http\Requests\SuratKeluar\UpdateRequest;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Surat Keluar';
        $data['suratKeluar'] = T_SuratKeluar::getAll();
        return view('pages.surat-keluar.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Siapkan data untuk halaman tambah surat keluar
        $data['title'] = 'Tambah Surat Keluar';
        $data['bagian'] = [
            'Perbekel Desa Sidakarya',
            'Kasi Pelayanan',
            'Kaur Keuangan',
            'Kasi Kesejahtraan',
            'Kasi Pemerintahan',
            'Kasi Tata Usaha dan Umum',
            'Kaur Perencanaan',
            'Sekretaris Desa',
            'Kepala Dusun',
        ];

        return view('pages.surat-keluar.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // DB Transaction
        DB::beginTransaction();

        // Insert surat masuk
        $suratMasukData = $request->data();
        $suratMasuk = T_SuratMasuk::create($suratMasukData);

        // Upload lampiran
        foreach ($request->lampiran as $lampiran) {
            $path = 'public\assets\uploads\lampiran';
            $fileName = FileController::upload($lampiran, $path);

            $lampiranData = [
                'id_surat' => $suratMasuk->id_surat_masuk,
                'nama' => $fileName,
                'jenis' => 'Surat Masuk',
            ];

            T_Lampiran::create($lampiranData);
        }

        // End DB Transaction
        DB::commit();

        // Munculkan pesan succes jika insert berhasil
        $alert['type'] = 'success';
        $alert['message'] = 'Data surat masuk berhasil ditambah.';
        return redirect()->route('surat-masuk.index')->with('alert', $alert);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Detail Surat Keluar';
        $data['suratKeluar'] = T_SuratKeluar::find($id);
        return view('pages.surat-keluar.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
