<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeProduk extends Model
{
    use HasFactory;

    protected $guarded = [' '];

    protected $table = 'tipeproduks';

    public function produk()
    {
        return $this->hasMany(Produk::class, 'tipe_produk_id');
    }
}
