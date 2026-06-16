<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // 1. Validasi Login
        if ($this->routeIs('loginproses')) {
            return [
                'email'    => ['required', 'email', 'max:100'],
                'password' => ['required', 'string', 'min:6'],
            ];
        }

        // 2. Validasi Update Password Pengguna
        if ($this->routeIs('user.updatePassword')) {
            return [
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ];
        }

        // 3. Validasi CRUD User (Store & Update)
        $userId = $this->route('user') 
            ? (is_object($this->route('user')) ? $this->route('user')->id : $this->route('user')) 
            : null;

        $rules = [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $userId],
            'roles' => ['required', 'string', 'in:admin,user'],
        ];

        if ($this->isMethod('POST')) {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        } else {
            $rules['password'] = ['nullable', 'string', 'min:8', 'confirmed'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            // Login & Umum
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.max'          => 'Email maksimal 255 karakter.',
            'email.unique'       => 'Email sudah terdaftar.',
            
            // Password
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal :min karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',

            // Nama & Role
            'name.required'      => 'Nama wajib diisi.',
            'name.max'           => 'Nama maksimal 255 karakter.',
            'roles.required'     => 'Role wajib dipilih.',
            'roles.in'           => 'Role tidak valid.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'     => 'Nama',
            'email'    => 'Email',
            'password' => 'Password',
            'roles'    => 'Role',
        ];
    }
}
