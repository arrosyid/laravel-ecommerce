<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryStokOpname extends Model
{
    use HasFactory;

    protected $table = 'history_stok_opnames';

    protected $fillable = [
        'id_produk',
        'stok_awal',
        'stok_akhir',
        'perubahan',
        'keterangan',
        'tanggal',
        'id_user',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
