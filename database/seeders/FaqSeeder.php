<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            // Pemesanan & Pembayaran
            [
                'question' => 'Bagaimana cara memesan roster dinding di sini?',
                'answer' => 'Pemesanan dapat dilakukan dengan dua cara mudah. Pertama, melalui portal admin kami jika Anda telah terdaftar sebagai mitra aktif. Kedua, dengan langsung menghubungi WhatsApp Hubungan Pelanggan kami pada nomor yang tertera untuk konsultasi gratis dan penerbitan penawaran harga.',
                'category' => 'pemesanan',
            ],
            [
                'question' => 'Apakah ada syarat minimum pembelian produk roster?',
                'answer' => 'Kami tidak menetapkan batas minimum pembelian; Anda dapat memesan eceran sesuai kebutuhan renovasi rumah. Namun, untuk mendapatkan fasilitas harga grosir distributor dan diskon volume, minimal pembelian adalah 100 pcs per jenis motif roster.',
                'category' => 'pemesanan',
            ],
            [
                'question' => 'Metode pembayaran apa saja yang didukung?',
                'answer' => 'Kami menerima pembayaran via Transfer Bank (Virtual Account / Rekening Resmi Perusahaan). Untuk proyek konstruksi skala menengah hingga besar, kami juga menyediakan skema termin pembayaran sesuai kesepakatan kontrak kerja sama.',
                'category' => 'pemesanan',
            ],

            // Spesifikasi & Kustomisasi
            [
                'question' => 'Berapa dimensi ukuran standar dari roster beton?',
                'answer' => 'Secara umum, dimensi standar roster beton kami adalah 20 x 20 x 10 cm. Berat rata-rata berkisar antara 3.5 kg hingga 4.2 kg per pcs tergantung dari pola motif lubang ventilasinya. Kami juga menyediakan opsi roster tipis berukuran tebal 8 cm untuk beberapa motif minimalis tertentu.',
                'category' => 'spesifikasi',
            ],
            [
                'question' => 'Apakah roster tanah liat aman dari rembesan air dan jamur?',
                'answer' => 'Ya, seluruh roster tanah liat (terracotta) kami diproduksi menggunakan pembakaran suhu tinggi sehingga memiliki kepadatan prima. Namun untuk pemasangan eksterior luar ruangan, kami merekomendasikan pemberian lapisan coating waterproof transparan pasca pemasangan untuk mencegah tumbuhnya lumut dan jamur akibat kelembapan ekstrem.',
                'category' => 'spesifikasi',
            ],
            [
                'question' => 'Apakah bisa memesan roster dengan bentuk motif kustom sendiri?',
                'answer' => 'Tentu bisa. Kami menerima pemesanan motif khusus (custom design) dengan ketentuan minimum pemesanan 500 pcs untuk menutupi biaya pembuatan cetakan baru. Estimasi waktu pembuatan berkisar antara 2 hingga 4 minggu dari persetujuan cetak blueprint desain.',
                'category' => 'spesifikasi',
            ],

            // Pengiriman & Garansi
            [
                'question' => 'Bagaimana mekanisme pengiriman barang ke luar kota/pulau?',
                'answer' => 'Untuk pengiriman di wilayah Jawa, kami menggunakan truk armada milik sendiri untuk meminimalisasi handling berlebih. Sementara untuk pengiriman luar pulau (Sumatera, Bali, Kalimantan, Sulawesi), kami bekerja sama dengan perusahaan ekspedisi kargo tepercaya dengan sistem palet kayu kokoh guna menjamin keamanan produk.',
                'category' => 'pengiriman',
            ],
            [
                'question' => 'Apakah ada jaminan garansi jika roster pecah saat diterima?',
                'answer' => 'Ya, kami memberikan garansi penggantian penuh 100% untuk setiap roster yang pecah selama proses perjalanan pengiriman. Konsumen cukup mengirimkan bukti foto/video unboxing saat barang diturunkan dari truk pengirim kepada layanan pelanggan kami dalam waktu maksimal 1x24 jam dari barang diterima.',
                'category' => 'pengiriman',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
