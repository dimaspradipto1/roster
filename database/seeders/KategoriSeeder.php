<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'Roster Beton'],
            ['nama_kategori' => 'Roster Tanah Liat (Terakota)'],
            ['nama_kategori' => 'Roster GRC'],
            ['nama_kategori' => 'Roster Keramik'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['nama_kategori' => $cat['nama_kategori']], $cat);
        }
    }
}
