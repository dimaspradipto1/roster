<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InspeksiRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'no_laporan'          => ['required', 'string', 'max:255'],
            'unit'                => ['required', 'integer', 'min:1'],
            'bidang_inspeksi'     => ['required', 'string', 'max:255'],
            'perusahaan_pemilik'  => ['required', 'string', 'max:255'],
            'alamat_perusahaan'   => ['required', 'string'],
            'nama_alat'           => ['required', 'string', 'max:255'],
            'nomor_seri'          => ['nullable', 'string', 'max:255'],
            'tanggal_inspeksi'    => ['required', 'date'],
            'tanggal_expired'     => ['required', 'date', 'after_or_equal:tanggal_inspeksi'],
            'keterangan'          => ['nullable', 'string'],
            'file_laporan'        => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:10240'],
        ];
    }

    /**
     * Custom validation messages in Indonesian.
     */
    public function messages(): array
    {
        return [
            'no_laporan.required'          => 'Nomor Laporan wajib diisi.',
            'no_laporan.max'               => 'Nomor Laporan maksimal 255 karakter.',
            'unit.required'                => 'Jumlah Unit wajib diisi.',
            'unit.integer'                 => 'Jumlah Unit harus berupa angka.',
            'unit.min'                     => 'Jumlah Unit minimal 1.',
            'bidang_inspeksi.required'     => 'Bidang Inspeksi wajib diisi.',
            'perusahaan_pemilik.required'  => 'Perusahaan Pemilik wajib diisi.',
            'alamat_perusahaan.required'   => 'Alamat Perusahaan wajib diisi.',
            'nama_alat.required'           => 'Nama Alat / Merk wajib diisi.',
            'tanggal_inspeksi.required'    => 'Tanggal Inspeksi wajib diisi.',
            'tanggal_inspeksi.date'        => 'Format Tanggal Inspeksi tidak valid.',
            'tanggal_expired.required'     => 'Tanggal Expired wajib diisi.',
            'tanggal_expired.date'         => 'Format Tanggal Expired tidak valid.',
            'tanggal_expired.after_or_equal' => 'Tanggal Expired tidak boleh sebelum Tanggal Inspeksi.',
            'file_laporan.mimes'           => 'File Laporan harus berformat PDF, JPG, JPEG, atau PNG.',
            'file_laporan.max'             => 'Ukuran file laporan maksimal 10 MB.',
        ];
    }
}
