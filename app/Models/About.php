<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';

    protected $fillable = [
        'judul_profil',
        'deskripsi_profil_1',
        'deskripsi_profil_2',
        'visi',
        'visi_judul',
        'visi_icon',
        'misi',
        'misi_judul',
        'misi_icon',
        'judul_nilai',
        'deskripsi_nilai',
        'nilai_1_judul',
        'nilai_1_deskripsi',
        'nilai_1_icon',
        'nilai_2_judul',
        'nilai_2_deskripsi',
        'nilai_2_icon',
        'nilai_3_judul',
        'nilai_3_deskripsi',
        'nilai_3_icon',
        'nilai_4_judul',
        'nilai_4_deskripsi',
        'nilai_4_icon',
    ];
}
