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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('pekerjaan');  // e.g. Kontraktor, Bandung
            $table->string('kategori');   // kontraktor, arsitek, pemilik
            $table->integer('bintang')->default(5); // 1-5
            $table->text('pesan');
            $table->boolean('aktif')->default(false); // Moderasi admin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
