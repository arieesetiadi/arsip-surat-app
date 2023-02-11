<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

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
        return [
            'username' => 'required|string|unique:users,username,' . auth()->user()->id,
            'name' => 'required|string|min:8|max:255',
            'email' => 'required|email|min:8|max:255|unique:users,email,' . auth()->user()->id,
            'phone' => 'required|string|min:10|max:15',
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Username',
            'name' => 'Nama lengkap',
            'email' => 'Email',
            'phone' => 'Nomor telepon',
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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'updated_at' => now()
        ];

        if($this->password){
            $data['password'] = Hash::make($this->password);
        }

        return $data;
    }
}
