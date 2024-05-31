<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'tipeproduk_id',
        'gambar',
        'deskripsi',
        'stok',
    ];

    public function tipeproduk()
    {
        return $this->belongsTo(tipeproduk::class,"tipeproduk_id", "id");
    }
    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
