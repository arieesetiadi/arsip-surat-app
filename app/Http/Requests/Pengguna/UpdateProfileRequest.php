<?php

namespace App\Http\Requests\Pengguna;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateProfileRequest extends FormRequest
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
            'username' => 'required|string|unique:t_pengguna,username,' . pengguna()->id_pengguna . ',id_pengguna',
            'nama' => 'required|string|min:8|max:255',
            'email' => 'required|email|min:8|max:255|unique:t_pengguna,email,' . pengguna()->id_pengguna . ',id_pengguna',
            'telepon' => 'required|string|min:10|max:15',
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Username',
            'nama' => 'Nama lengkap',
            'email' => 'Email',
            'telepon' => 'Nomor telepon',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi.',
            'string' => ':attribute tidak valid.',
            'email' => ':attribute tidak valid.',
            'min' => ':attribute harus memiliki minimal :min karakter.',
            'max' => ':attribute harus memiliki maksimal :max karakter.',
            'unique' => ':attribute ini telah terdaftar.',
        ];
    }

    public function data(){
        $data = [
            'username' => $this->username,
            'nama' => $this->nama,
            'email' => $this->email,
            'telepon' => $this->telepon,
            'tanggal_diubah' => now()
        ];

        if($this->password){
            $data['password'] = Hash::make($this->password);
        }

        return $data;
    }
}
