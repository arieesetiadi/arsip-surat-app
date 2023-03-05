<?php

namespace App\Http\Requests\Pengguna;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $rules = [
            'username' => 'required|string|unique:t_pengguna,username,' . request()->route()->pengguna . ',id_pengguna',
            'nama' => 'required|string|min:8|max:255',
            'email' => 'required|email|min:8|max:255|unique:t_pengguna,email,' . request()->route()->pengguna . ',id_pengguna',
            'telepon' => 'required|string|min:10|max:15',
            'id_jenis_pengguna' => 'required',
        ];

        if($this->password){
            $rules['password'] = 'required|max:255|confirmed';
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'username' => 'Username',
            'nama' => 'Nama lengkap',
            'email' => 'Email',
            'telepon' => 'Nomor telepon',
            'pasword' => 'Password',
            'id_jenis_pengguna' => 'Jenis pengguna'
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
            'confirmed' => 'Konfirmasi password harus sama.'
        ];
    }

    public function data(){
        $data = [
            'username' => $this->username,
            'nama' => $this->nama,
            'email' => $this->email,
            'telepon' => $this->telepon,
            'id_jenis_pengguna' => $this->id_jenis_pengguna,
            'tanggal_diubah' => now()
        ];

        if($this->password){
            $data['password'] = Hash::make($this->password);
        }

        return $data;
    }
}
