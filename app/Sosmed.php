<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    protected $fillable = ['nama_sosmed', 'gambar', 'link', 'tampilkan'];

    protected $table = 'sosmeds';
}
