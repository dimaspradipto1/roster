<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profils';

    protected $fillable = [
        'logo',
        'nama_perusahaan',
        'nama_pemilik',
        'no_telp',
        'alamat',
    ];
}
