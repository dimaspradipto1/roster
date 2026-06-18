<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'icon'      => 'bi-grid-3x3-gap-fill',
                'judul'     => 'Motif Terlengkap',
                'deskripsi' => 'Tersedia 50+ pilihan motif roster dari minimalis modern hingga premium klasik, cocok untuk berbagai konsep arsitektur.',
                'urutan'    => 1,
            ],
            [
                'icon'      => 'bi-award',
                'judul'     => 'Bersertifikat SNI',
                'deskripsi' => 'Seluruh produk kami telah memenuhi standar SNI dan teruji kekuatan serta ketahanan materialnya untuk jangka panjang.',
                'urutan'    => 2,
            ],
            [
                'icon'      => 'bi-currency-dollar',
                'judul'     => 'Harga Kompetitif',
                'deskripsi' => 'Harga grosir langsung dari distributor resmi. Dapatkan penawaran terbaik untuk pembelian partai besar dengan diskon menarik.',
                'urutan'    => 3,
            ],
            [
                'icon'      => 'bi-headset',
                'judul'     => 'Konsultasi Gratis',
                'deskripsi' => 'Tim ahli kami siap membantu Anda memilih jenis dan motif roster yang tepat sesuai desain dan kebutuhan bangunan Anda.',
                'urutan'    => 4,
            ],
        ];

        foreach ($features as $f) {
            Feature::create($f);
        }
    }
}
