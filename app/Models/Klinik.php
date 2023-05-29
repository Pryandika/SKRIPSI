<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klinik extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_klinik',
        'quota',
        'jam_buka',
        'jam_tutup',
        'is_active'       
    ];

    public $timestamps = false;
}
