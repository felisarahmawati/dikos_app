<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamars';

    protected $fillable = [
        'tipekamar_id',
        'nomor_kamar',
        'gambar',
        'deskripsi',
        'stok',
    ];

    public static function generateNomorKamar($tipekamar_id)
    {
        $stok = self::where('tipekamar_id', $tipekamar_id)->count();
        return 'KAM-' . $tipekamar_id . '-' . ($stok + 1);
    }
    public function tipekamar()
    {
        return $this->belongsTo(tipekamar::class,"tipekamar_id", "id");
    }
}
