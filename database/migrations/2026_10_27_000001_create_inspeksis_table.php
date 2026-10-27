<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inspeksis', function (Blueprint $table) {
            $table->id();
            $table->string('no_laporan');                      // No Laporan (contoh: 001-003/BJI-PTP03/I/2025)
            $table->integer('unit')->default(1);              // Unit (jumlah alat)
            $table->string('bidang_inspeksi');                // Bidang Inspeksi (contoh: PTP, PAA, PUBT)
            $table->string('perusahaan_pemilik');             // Perusahaan Pemilik
            $table->text('alamat_perusahaan');                // Alamat Perusahaan
            $table->string('nama_alat');                      // Nama Alat / Nama Merk
            $table->string('nomor_seri')->nullable();         // Nomor Seri
            $table->date('tanggal_inspeksi');                 // Tanggal Inpek / Inspeksi
            $table->date('tanggal_expired');                  // Expired (Tanggal Kedaluwarsa)
            $table->text('keterangan')->nullable();           // Keterangan / Catatan tambahan
            $table->string('file_laporan')->nullable();       // Dokumen PDF laporan (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspeksis');
    }
};
