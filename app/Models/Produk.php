<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'id_kategori',
        'kode_produk',
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'satuan',
        'gambar',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
