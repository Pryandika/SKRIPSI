<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polatarif extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_klinik',
        'nama_pola',
        'biaya',   
    ];

    public $timestamps = false;
}
