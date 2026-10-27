<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Inspeksi extends Model
{
    protected $table = 'inspeksis';

    protected $fillable = [
        'no_laporan',
        'unit',
        'bidang_inspeksi',
        'perusahaan_pemilik',
        'alamat_perusahaan',
        'nama_alat',
        'nomor_seri',
        'tanggal_inspeksi',
        'tanggal_expired',
        'keterangan',
        'file_laporan',
    ];

    protected $casts = [
        'unit'             => 'integer',
        'tanggal_inspeksi' => 'date',
        'tanggal_expired'  => 'date',
    ];

    /**
     * Cek status masa berlaku inspeksi:
     * - 'expired' : Sudah lewat tanggal expired
     * - 'warning' : Akan kedaluwarsa dalam <= 30 hari
     * - 'active'  : Masih berlaku aman
     */
    public function getStatusMasaBerlakuAttribute(): string
    {
        if (!$this->tanggal_expired) {
            return 'unknown';
        }

        $today = Carbon::today();
        $expired = Carbon::parse($this->tanggal_expired);

        if ($today->gt($expired)) {
            return 'expired';
        }

        if ($today->diffInDays($expired, false) <= 30) {
            return 'warning';
        }

        return 'active';
    }

    /**
     * Label status bahasa Indonesia
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status_masa_berlaku) {
            'expired' => 'Kedaluwarsa',
            'warning' => 'Segera Berakhir',
            'active'  => 'Aktif / Berlaku',
            default   => 'Tidak Diketahui',
        };
    }
}
