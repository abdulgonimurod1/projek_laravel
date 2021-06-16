<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cara_pemesanan extends Model
{
    protected $table = 'cara_pembayarans';

    protected $fillable = [
        'gambar',
        'judul', 
        'langkah1', 
        'langkah2', 
        'langkah3', 
        'langkah4', 
        'langkah5', 
        'langkah6', 
        'langkah7', 
        'langkah8', 
        'langkah9',
        'langkah10',
        'tampilkan'
    ];

    protected $primaryKey = 'id';
}
