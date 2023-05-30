<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'FKTP',
        'file_path_FKTP',
        'KTP',
        'file_path_KTP',
        'BPJS',
        'file_path_BPJS',
    ];
}