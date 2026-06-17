<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            // Profil Perusahaan
            'judul_profil'      => 'Dedikasi Terhadap Keindahan & Sirkulasi Udara Alami',
            'deskripsi_profil_1' => 'Roster Dinding Minimalis didirikan pada tahun 2016 berawal dari sebuah keyakinan sederhana: bahwa sirkulasi udara alami dan pencahayaan matahari dapat dipadukan secara harmonis dengan nilai estetika arsitektur modern. Kami memahami bahwa rumah bukan sekadar tempat berlindung, melainkan mahakarya visual yang hidup.',
            'deskripsi_profil_2' => 'Sebagai distributor resmi terpercaya, kami menjembatani kebutuhan pemilik rumah, arsitek, dan kontraktor dengan produsen roster beton dan bata ventilasi berstandar SNI. Selama bertahun-tahun, kami telah terlibat dalam ratusan proyek hunian, ruko, bangunan ibadah, hingga bangunan komersial berskala besar di seluruh wilayah Indonesia.',

            // Visi
            'visi_judul' => 'Visi Kami',
            'visi_icon'  => 'bi-eye',
            'visi'       => 'Menjadi distributor roster dinding dan bata ventilasi terdepan di Indonesia yang dikenal karena keunggulan kualitas material, keragaman motif arsitektural, dan integritas pelayanan yang menginspirasi keindahan setiap ruang tinggal.',

            // Misi (setiap poin dipisah dengan \n)
            'misi_judul' => 'Misi Kami',
            'misi_icon'  => 'bi-rocket-takeoff',
            'misi'       => "Menyediakan produk roster dekoratif kualitas premium bersertifikat SNI dengan daya tahan optimal terhadap cuaca tropis.\nMenawarkan ragam motif roster inovatif yang mengikuti perkembangan tren arsitektur dunia.\nMemberikan konsultasi gratis dan estimasi kebutuhan yang akurat demi efisiensi biaya proyek konsumen.\nMengirimkan pesanan tepat waktu dan aman menggunakan armada khusus untuk menjaga kualitas fisik barang hingga lokasi tujuan.",

            // Nilai Utama Kami — Section Header
            'judul_nilai'     => 'Prinsip Kerja yang Kami Pegang Teguh',
            'deskripsi_nilai' => 'Kualitas dan kepercayaan bukanlah sebuah kebetulan, melainkan hasil dari komitmen terhadap nilai-nilai yang kami terapkan setiap hari.',

            // Nilai 1 — Kualitas Bersertifikasi
            'nilai_1_judul'     => 'Kualitas Bersertifikasi',
            'nilai_1_deskripsi' => 'Produk kami melalui proses kontrol kualitas ketat untuk memastikan kekuatan beton prima dan sudut presisi standar SNI.',
            'nilai_1_icon'      => 'bi-shield-fill-check',

            // Nilai 2 — Keanekaragaman Motif
            'nilai_2_judul'     => 'Keanekaragaman Motif',
            'nilai_2_deskripsi' => 'Kami menghadirkan lebih dari 50+ pilihan motif eksklusif mulai dari gaya klasik, minimalis geometric, hingga motif etnik modern.',
            'nilai_2_icon'      => 'bi-palette-fill',

            // Nilai 3 — Fokus pada Pelanggan
            'nilai_3_judul'     => 'Fokus pada Pelanggan',
            'nilai_3_deskripsi' => 'Tim kami berorientasi pada kepuasan pelanggan dengan merespons cepat setiap pertanyaan dan membantu kalkulasi kebutuhan.',
            'nilai_3_icon'      => 'bi-people-fill',

            // Nilai 4 — Distribusi Aman
            'nilai_4_judul'     => 'Distribusi Aman',
            'nilai_4_deskripsi' => 'Didukung logistik profesional, pengiriman dijamin aman dan minim risiko pecah di jalan. Kami garansi 100% jika ada kerusakan.',
            'nilai_4_icon'      => 'bi-truck-flatbed',
        ]);
    }
}
