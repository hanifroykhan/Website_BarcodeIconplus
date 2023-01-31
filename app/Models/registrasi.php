<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registrasi extends Model
{
    use HasFactory;
    protected $table ="registrasis";

    protected $fillable = [ 
        'no_spa',
        'user',
        'sid',
        'layanan',
        'tikor',
        'namaMitra',
        'picMitra',
        'fatKode',
        'portFAT',
        'idle',
        'tikorFAT',
        'olt',
        'panjangKabel',
        'snONT',
        'macONT',
    ];
}
