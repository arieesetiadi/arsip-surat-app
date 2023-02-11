<?php

namespace App\Http\Requests\User;

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
            'username' => 'required|string|unique:users,username,' . request()->route()->id,
            'name' => 'required|string|min:8|max:255',
            'email' => 'required|email|min:8|max:255|unique:users,email,' . request()->route()->id,
            'phone' => 'required|string|min:10|max:15',
            'role' => 'required',
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
            'name' => 'Nama lengkap',
            'email' => 'Email',
            'phone' => 'Nomor telepon',
            'pasword' => 'Password',
            'role' => 'Jenis pengguna'
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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role,
            'created_at' => now()
        ];

        if($this->password){
            $data['password'] = Hash::make($this->password);
        }

        return $data;
    }
}
