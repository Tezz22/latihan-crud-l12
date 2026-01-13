<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    protected $fillable = [
        'supplier_id',
        'nama_barang',
        'jumlah_barang',
        'kategori_barang',
        'harga_barang',
    ];
}
