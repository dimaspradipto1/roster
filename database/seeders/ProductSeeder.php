<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID kategori dinamis
        $beton = Category::where('nama_kategori', 'Roster Beton')->first();
        $terakota = Category::where('nama_kategori', 'Roster Tanah Liat (Terakota)')->first();
        $grc = Category::where('nama_kategori', 'Roster GRC')->first();
        $keramik = Category::where('nama_kategori', 'Roster Keramik')->first();

        $products = [
            // Roster Beton
            [
                'category_id' => $beton ? $beton->id : 1,
                'kode_produk' => 'RB-01',
                'nama_produk' => 'Roster Beton Wajik',
                'panjang' => 20,
                'lebar' => 20,
                'tebal' => 10,
                'harga' => 15000,
                'stok' => 200,
            ],
            [
                'category_id' => $beton ? $beton->id : 1,
                'kode_produk' => 'RB-02',
                'nama_produk' => 'Roster Beton Sakura',
                'panjang' => 20,
                'lebar' => 20,
                'tebal' => 10,
                'harga' => 16000,
                'stok' => 150,
            ],
            [
                'category_id' => $beton ? $beton->id : 1,
                'kode_produk' => 'RB-03',
                'nama_produk' => 'Roster Beton Minimalis Nako',
                'panjang' => 20,
                'lebar' => 20,
                'tebal' => 10,
                'harga' => 18000,
                'stok' => 300,
            ],

            // Roster Tanah Liat (Terakota)
            [
                'category_id' => $terakota ? $terakota->id : 2,
                'kode_produk' => 'RTL-01',
                'nama_produk' => 'Roster Terakota Melati',
                'panjang' => 20,
                'lebar' => 20,
                'tebal' => 10,
                'harga' => 12000,
                'stok' => 120,
            ],
            [
                'category_id' => $terakota ? $terakota->id : 2,
                'kode_produk' => 'RTL-02',
                'nama_produk' => 'Roster Terakota Wajik Klasik',
                'panjang' => 20,
                'lebar' => 20,
                'tebal' => 10,
                'harga' => 13000,
                'stok' => 250,
            ],
            [
                'category_id' => $terakota ? $terakota->id : 2,
                'kode_produk' => 'RTL-03',
                'nama_produk' => 'Roster Terakota Tapak Kucing',
                'panjang' => 20,
                'lebar' => 20,
                'tebal' => 10,
                'harga' => 14000,
                'stok' => 180,
            ],

            // Roster GRC
            [
                'category_id' => $grc ? $grc->id : 3,
                'kode_produk' => 'RG-01',
                'nama_produk' => 'Roster GRC Ornament Modern',
                'panjang' => 30,
                'lebar' => 30,
                'tebal' => 8,
                'harga' => 35000,
                'stok' => 80,
            ],
            [
                'category_id' => $grc ? $grc->id : 3,
                'kode_produk' => 'RG-02',
                'nama_produk' => 'Roster GRC Minimalis Putih',
                'panjang' => 30,
                'lebar' => 30,
                'tebal' => 8,
                'harga' => 38000,
                'stok' => 100,
            ],

            // Roster Keramik
            [
                'category_id' => $keramik ? $keramik->id : 4,
                'kode_produk' => 'RK-01',
                'nama_produk' => 'Roster Keramik Glossy Putih',
                'panjang' => 20,
                'lebar' => 20,
                'tebal' => 8,
                'harga' => 45000,
                'stok' => 50,
            ],
            [
                'category_id' => $keramik ? $keramik->id : 4,
                'kode_produk' => 'RK-02',
                'nama_produk' => 'Roster Keramik Glossy Pola Bunga',
                'panjang' => 20,
                'lebar' => 20,
                'tebal' => 8,
                'harga' => 48000,
                'stok' => 40,
            ],
        ];

        foreach ($products as $prod) {
            Product::updateOrCreate(['kode_produk' => $prod['kode_produk']], $prod);
        }
    }
}
