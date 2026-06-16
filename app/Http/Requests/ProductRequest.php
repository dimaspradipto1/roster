<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product') 
            ? (is_object($this->route('product')) ? $this->route('product')->id : $this->route('product')) 
            : null;

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'kode_produk' => ['required', 'string', 'max:255', 'unique:products,kode_produk,' . $productId],
            'nama_produk' => ['required', 'string', 'max:255'],
            'panjang' => ['required', 'integer', 'min:0'],
            'lebar' => ['required', 'integer', 'min:0'],
            'tebal' => ['required', 'integer', 'min:0'],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'kode_produk.required' => 'Kode produk wajib diisi.',
            'kode_produk.unique' => 'Kode produk sudah digunakan.',
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'panjang.required' => 'Panjang wajib diisi.',
            'panjang.integer' => 'Panjang harus berupa angka bulat.',
            'lebar.required' => 'Lebar wajib diisi.',
            'lebar.integer' => 'Lebar harus berupa angka bulat.',
            'tebal.required' => 'Tebal wajib diisi.',
            'tebal.integer' => 'Tebal harus berupa angka bulat.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.integer' => 'Stok harus berupa angka bulat.',
        ];
    }
}
