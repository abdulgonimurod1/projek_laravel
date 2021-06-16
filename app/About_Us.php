<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About_Us extends Model
{
    protected $table = 'about_us';

    protected $fillable = ['nama_perusahaan', 'deskripsi', 'gambar', 'tampilkan'];

    protected $primaryKey = 'id';
}
