<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

    protected $fillable = ['id_produk', 'deskripsi','harga','link_tokopedia','link_lazada','link_shopee'];

    protected $primaryKey = 'id_konten';
}
