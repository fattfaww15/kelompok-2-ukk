<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gerai extends Model
{
        protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'kota',
        'telepon',
    ];

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'gerai_id');
    }
}