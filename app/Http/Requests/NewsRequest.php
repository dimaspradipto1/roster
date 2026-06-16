<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'content' => ['required', 'string'],
            'status' => ['required', 'in:draft,published'],
        ];

        if ($this->isMethod('POST')) {
            $rules['thumbnail'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp'];
        } else {
            $rules['thumbnail'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul wajib diisi.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'description.required' => 'Deskripsi singkat wajib diisi.',
            'description.max' => 'Deskripsi singkat maksimal 1000 karakter.',
            'content.required' => 'Konten berita wajib diisi.',
            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status tidak valid.',
            'thumbnail.required' => 'Thumbnail wajib diunggah.',
            'thumbnail.image' => 'File harus berupa gambar.',
            'thumbnail.mimes' => 'Format gambar harus jpeg, png, jpg, gif, svg, atau webp.',
        ];
    }
}
