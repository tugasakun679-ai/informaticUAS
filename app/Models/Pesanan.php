<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemesan',
        'no_hp',
        'alamat',
        'barang_id',
        'jumlah_pesanan',
        'catatan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
