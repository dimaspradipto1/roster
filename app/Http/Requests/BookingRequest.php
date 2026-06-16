<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'nomor_admin_id' => ['required', 'exists:nomor_admins,id'],
            'nama' => ['required', 'string', 'max:255'],
            'no_wa' => ['required', 'string', 'max:20'],
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Produk wajib dipilih.',
            'product_id.exists' => 'Produk tidak valid.',
            'nomor_admin_id.required' => 'Nomor admin wajib dipilih.',
            'nomor_admin_id.exists' => 'Nomor admin tidak valid.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'no_wa.required' => 'Nomor WhatsApp wajib diisi.',
            'no_wa.max' => 'Nomor WhatsApp maksimal 20 karakter.',
        ];
    }
}
