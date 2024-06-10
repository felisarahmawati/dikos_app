<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'buktipembayarans';

    protected $guarded = [' '];


    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
