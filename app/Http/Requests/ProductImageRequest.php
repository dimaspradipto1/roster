<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'product_id' => ['required', 'exists:products,id'],
        ];

        if ($this->isMethod('POST')) {
            $rules['foto'] = ['required', 'array'];
            $rules['foto.*'] = ['image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'];
        } else {
            $rules['foto'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Produk wajib dipilih.',
            'product_id.exists' => 'Produk tidak valid.',
            'foto.required' => 'Gambar produk wajib diunggah.',
            'foto.array' => 'Format gambar tidak valid.',
            'foto.*.image' => 'Setiap file harus berupa gambar.',
            'foto.*.mimes' => 'Format gambar harus jpeg, png, jpg, gif, svg, atau webp.',
            'foto.*.max' => 'Ukuran setiap gambar maksimal 2MB.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus jpeg, png, jpg, gif, svg, atau webp.',
            'foto.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
