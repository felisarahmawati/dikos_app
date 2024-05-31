<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'buktipembayarans';

    protected $fillable = [
        'reservasi_id',
        'bukti_pembayaran',
        'status_konfirmasi',
    ];

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }
    
}
