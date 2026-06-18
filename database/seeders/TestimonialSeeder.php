<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'nama'      => 'Budi Nugraha',
                'pekerjaan' => 'Kontraktor, Bandung',
                'kategori'  => 'kontraktor',
                'bintang'   => 5,
                'pesan'     => 'Kualitas roster betonnya sangat bagus, presisi, dan sesuai dengan foto katalog. Pengiriman juga cepat serta pengemasan sangat aman untuk proyek perumahan kami di Bandung.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Sari Rahayu',
                'pekerjaan' => 'Pemilik Usaha, Surabaya',
                'kategori'  => 'pemilik',
                'bintang'   => 5,
                'pesan'     => 'Pilihan motifnya banyak sekali! Kami pakai roster minimalis terracotta untuk fasad toko kopi dan hasilnya sangat memuaskan. Pengunjung banyak memuji estetikanya.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Dimas Harianto',
                'pekerjaan' => 'Arsitek Utama, Jakarta',
                'kategori'  => 'arsitek',
                'bintang'   => 5,
                'pesan'     => 'Harga sangat kompetitif untuk standar kualitas SNI yang diberikan. Respons sales sangat cepat saat saya meminta katalog digital dan perhitungan estimasi kebutuhan semen.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Yusuf Pratama',
                'pekerjaan' => 'Pimpinan Proyek, Semarang',
                'kategori'  => 'kontraktor',
                'bintang'   => 5,
                'pesan'     => 'Sudah langganan lebih dari 2 tahun untuk penyediaan roster proyek komersial. Tidak pernah ada masalah keterlambatan kiriman, dan garansi klaim barang pecah diproses tanpa ribet.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Amelia Mahendra',
                'pekerjaan' => 'Interior Designer, Bali',
                'kategori'  => 'arsitek',
                'bintang'   => 5,
                'pesan'     => 'Sebagai desainer interior, saya sangat pemilih soal presisi material. Roster beton abu-abu dari sini memiliki finishing halus dan ukuran presisi, memudahkan pemasangan rapi.',
                'aktif'     => true,
            ],
            [
                'nama'      => 'Hendra Wijaya',
                'pekerjaan' => 'Pemilik Rumah, Tangerang',
                'kategori'  => 'pemilik',
                'bintang'   => 5,
                'pesan'     => 'Rumah kami sekarang terasa sejuk sepanjang hari sejak memasang dinding roster di area belakang. Sirkulasi udara jadi jauh lebih lancar tanpa AC berlebih. Sangat puas!',
                'aktif'     => true,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }
    }
}
