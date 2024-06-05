<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'buktipembayarans';

    protected $fillable = ['user_id', 'tanggal_masuk_uang', 'jumlah_uang', 'keterangan', 'bukti_pembayaran'];

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }

}
