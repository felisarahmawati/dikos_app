<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = "tampilanabout";

    protected $fillable = [
        'gambar', 'teks1', 'teks2',
    ];
}
