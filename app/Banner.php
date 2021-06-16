<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner_promo';

    protected $primaryKey = 'id';

    protected $fillable = ['gambar', 'tampilkan', 'link_promo'];
}
