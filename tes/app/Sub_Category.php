<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = ['id_kategori', 'sub_kategori'];

    protected $primaryKey = 'id_sub_kategori';

    public function category(){
        return $this->belongsTo(Category::class, 'id_kategori', 'id_kategori');
    }
}
