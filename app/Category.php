<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['nama_kategori', 'deskripsi', 'gambar'];

    protected $primaryKey = 'id_kategori';
    
    public function product()
    {
        return $this->hasMany(Product::class, 'id_kategori', 'id_kategori');
    }

    public function sub_category()
    {
        return $this->hasMany(Sub_Category::class, 'id_kategori', 'id_kategori');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($category) { // before delete() method call this
            $category->product()->each(function($product) {
                $product->delete(); // <-- direct deletion
            });

            $category->sub_category()->each(function($sub_category) {
                $sub_category->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
