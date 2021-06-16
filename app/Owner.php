<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owners';

    protected $fillable = ['owner', 'gambar', 'deskripsi', 'tampilkan'];
}
