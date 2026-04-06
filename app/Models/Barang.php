<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'kode',
        'kategori',
        'nama_barang',
        'harga',
        'stok',
        'supplier_id',
        'gerai_id',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function gerai()
    {
        return $this->belongsTo(Gerai::class, 'gerai_id');
    }
}
