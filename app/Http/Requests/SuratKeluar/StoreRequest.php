<?php

namespace App\Http\Requests\SuratKeluar;

use App\Models\T_SuratKeluar;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'penerima' => 'required',
            'tanggal_dikirim' => 'required|date',
            'perihal' => 'required',
            'pelaksana' => 'required',
            'bagian' => 'required',
            'lampiran.*' => 'required|file'
        ];
    }

    public function attributes()
    {
        return [
            'nomor_surat' => 'Nomor surat',
            'tanggal_surat' => 'Tanggal surat',
            'penerima' => 'Penerima',
            'tanggal_dikirim' => 'Tanggal dikirim',
            'perihal' => 'Perihal',
            'pelaksana' => 'Pelaksana',
            'bagian' => 'Bagian',
            'lampiran.*' => 'Lampiran'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi.',
            'date' => ':attribute harus berupa tanggal.',
            'file' => ':attribute harus berupa dokumen.',
        ];
    }

    public function data()
    {
        $data = [
            'id_pengguna' => pengguna()->id_pengguna,
            'nomor_urut' => T_SuratKeluar::getNomorUrut(),
            'nomor_surat' => $this->nomor_surat,
            'tanggal_surat' => $this->tanggal_surat,
            'pengirim' => pengguna()->nama,
            'penerima' => $this->penerima,
            'tanggal_dikirim' => $this->tanggal_dikirim,
            'perihal' => $this->perihal,
            'pelaksana' => $this->pelaksana,
            'bagian' => $this->bagian,
        ];

        return $data;
    }
}
