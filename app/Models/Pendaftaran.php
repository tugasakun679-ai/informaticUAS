<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftarans';

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jk',
        'alamat',
        'sekolah_asal',
        'nama_sekolah',
        'matematika',
        'inggris',
        'indonesia',
        'pilihan1',
        'pilihan2',
        'alasan',
    ];
}
