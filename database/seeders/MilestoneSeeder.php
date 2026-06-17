<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Milestone;

class MilestoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $milestones = [
            [
                'tahun'     => 2016,
                'judul'     => 'Awal Pendirian',
                'deskripsi' => 'Berdiri sebagai distributor lokal berskala kecil, fokus melayani pemesanan roster beton konvensional di wilayah sekitar.',
            ],
            [
                'tahun'     => 2019,
                'judul'     => 'Ekspansi Wilayah & Produk',
                'deskripsi' => 'Mulai melayani pengiriman luar kota se-Jawa Barat dan menambah lini produk roster tanah liat (clay) serta bata ventilasi minimalis modern.',
            ],
            [
                'tahun'     => 2022,
                'judul'     => 'Kemitraan Resmi & Standarisasi SNI',
                'deskripsi' => 'Menjadi distributor resmi utama dengan seluruh pasokan roster yang terstandarisasi mutu tinggi secara nasional (SNI).',
            ],
            [
                'tahun'     => 2026,
                'judul'     => 'Pelayanan Nasional Terdigitalisasi',
                'deskripsi' => 'Menghadirkan layanan pemesanan digital terintegrasi yang memudahkan pengiriman aman ke seluruh pulau di Indonesia dengan ratusan mitra kontraktor aktif.',
            ],
        ];

        foreach ($milestones as $item) {
            Milestone::create($item);
        }
    }
}
