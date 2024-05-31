<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $guarded = [' '];

    protected $table = 'reservasi';

    public function produk()
    {
        return $this->hasMany(Produk::class, 'tipe_produk_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function buktiPembayaran()
    {
        return $this->hasOne(BuktiPembayaran::class);
    }
}
