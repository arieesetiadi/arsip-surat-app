<?php

namespace App\Http\Requests\SuratMasuk;

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
            'nomor_surat_asal' => 'required',
            'tanggal_surat_asal' => 'required|date',
            'pengirim' => 'required',
            'tanggal_diterima' => 'required|date',
            'perihal' => 'required',
            'status' => 'required',
            'sifat' => 'required',
            'lampiran.*' => 'required|file'
        ];
    }

    public function attributes()
    {
        return [
            'nomor_surat_asal' => 'Nomor surat asal',
            'tanggal_surat_asal' => 'Tanggal surat asal',
            'pengirim' => 'Pengirim',
            'tanggal_diterima' => 'Tanggal diterima',
            'perihal' => 'Perihal',
            'status' => 'Status',
            'sifat' => 'Sifat',
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
            'nomor_urut' => generateNomorUrut(),
            'nomor_surat_asal' => $this->nomor_surat_asal,
            'tanggal_surat_asal' => $this->tanggal_surat_asal,
            'pengirim' => $this->pengirim,
            'penerima' => pengguna()->nama,
            'tanggal_diterima' => $this->tanggal_diterima,
            'perihal' => $this->perihal,
            'status' => $this->status,
            'sifat' => $this->sifat,
        ];

        return $data;
    }
}
