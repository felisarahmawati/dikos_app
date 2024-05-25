<?php

namespace App\Models;

use App\Models\Kamar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tipekamar extends Model
{
    use HasFactory;

    protected $guarded = [' '];
    
    protected $table = 'tipekamar';

    public function kamar()
    {
        return $this->hasMany(Kamar::class, 'tipe_kamar_id');
    }
}
