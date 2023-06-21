<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tanggal_reservasi',
        'klinik_tujuan',
        'jalur',
        'status'
    ];

    public $timestamps = false;
}
