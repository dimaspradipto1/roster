<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $categoryId = $this->route('kategori') 
            ? (is_object($this->route('kategori')) ? $this->route('kategori')->id : $this->route('kategori')) 
            : null;

        return [
            'nama_kategori' => ['required', 'string', 'max:255', 'unique:categories,nama_kategori,' . $categoryId],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.max' => 'Nama kategori maksimal 255 karakter.',
            'nama_kategori.unique' => 'Nama kategori sudah terdaftar.',
        ];
    }
}
