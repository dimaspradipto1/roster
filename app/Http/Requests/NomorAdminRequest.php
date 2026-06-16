<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NomorAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_admin' => ['required', 'string', 'max:255'],
            'no_wa' => ['required', 'string', 'max:20'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_admin.required' => 'Nama admin wajib diisi.',
            'nama_admin.string' => 'Nama admin harus berupa teks.',
            'nama_admin.max' => 'Nama admin maksimal 255 karakter.',
            'no_wa.required' => 'Nomor WhatsApp wajib diisi.',
            'no_wa.string' => 'Nomor WhatsApp harus berupa teks.',
            'no_wa.max' => 'Nomor WhatsApp maksimal 20 karakter.',
        ];
    }
}
