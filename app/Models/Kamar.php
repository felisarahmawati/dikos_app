<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamars';

    protected $guarded = [' '];

    public function tipekamar()
    {
        return $this->belongsTo(tipekamar::class,"tipekamar_id", "id");
    }
}
