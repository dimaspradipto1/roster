<?php

namespace Database\Seeders;

use App\Models\Inspeksi;
use Illuminate\Database\Seeder;

class InspeksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'no_laporan'          => '001-003/BJI-PTP03/I/2025',
                'unit'                => 3,
                'bidang_inspeksi'     => 'PTP',
                'perusahaan_pemilik'  => 'PT. AMBER KARYA',
                'alamat_perusahaan'   => 'Tunas Industrial Estate Blok 8C Jl. Engku Putri-Batam Centre',
                'nama_alat'           => 'MESIN MOLDING',
                'nomor_seri'          => null,
                'tanggal_inspeksi'    => '2025-01-17',
                'tanggal_expired'     => '2026-01-17',
            ],
            [
                'no_laporan'          => '004/BJI-PTP01/I/2025',
                'unit'                => 1,
                'bidang_inspeksi'     => 'PTP',
                'perusahaan_pemilik'  => 'PT. PETRUS INDONESIA',
                'alamat_perusahaan'   => 'Jalan Brigjen Katamso MKM, Tj. Uncang, Kec. Batu Aji, Kota Batam, Kepulauan Riau 29424',
                'nama_alat'           => 'GENERATOR SET',
                'nomor_seri'          => null,
                'tanggal_inspeksi'    => '2025-01-21',
                'tanggal_expired'     => '2026-01-21',
            ],
            [
                'no_laporan'          => '005/BJI-PAA02/I/2025',
                'unit'                => 1,
                'bidang_inspeksi'     => 'PAA',
                'perusahaan_pemilik'  => 'PT. SEMPURNA MITRA SARANA',
                'alamat_perusahaan'   => 'Jl. Raya Barelang KM 02 Tembesi Batam, Provinsi Kepulauan Riau',
                'nama_alat'           => 'BULLDOZER',
                'nomor_seri'          => '4482',
                'tanggal_inspeksi'    => '2025-02-17',
                'tanggal_expired'     => '2026-02-17',
            ],
            [
                'no_laporan'          => '006/BJI-BBT01/I/2025',
                'unit'                => 1,
                'bidang_inspeksi'     => 'PUBT',
                'perusahaan_pemilik'  => 'PT RAINBOW TUBULARS MANUFACTURE',
                'alamat_perusahaan'   => 'Latrade Industrial Park Blok G5-G7 Tanjung Uncang, Batam, Kepulauan Riau-Indonesia',
                'nama_alat'           => 'Air Receiver Tank',
                'nomor_seri'          => null,
                'tanggal_inspeksi'    => '2025-01-21',
                'tanggal_expired'     => '2026-01-21',
            ],
            [
                'no_laporan'          => '007/BJI-BBT01/I/2025',
                'unit'                => 1,
                'bidang_inspeksi'     => 'PUBT',
                'perusahaan_pemilik'  => 'PT RAINBOW TUBULARS MANUFACTURE',
                'alamat_perusahaan'   => 'Latrade Industrial Park Blok G5-G7 Tanjung Uncang, Batam, Kepulauan Riau-Indonesia',
                'nama_alat'           => 'Air Receiver Tank',
                'nomor_seri'          => null,
                'tanggal_inspeksi'    => '2025-01-21',
                'tanggal_expired'     => '2026-01-21',
            ],
        ];

        foreach ($data as $item) {
            Inspeksi::firstOrCreate(
                ['no_laporan' => $item['no_laporan']],
                $item
            );
        }
    }
}
