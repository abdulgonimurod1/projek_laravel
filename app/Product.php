<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'nama_produk','deskripsi','stok', 'harga', 'harga_diskon', 'id_kategori', 'gambar1', 'gambar2', 'gambar3',
        'jenis_produk', 'tampilkan', 'link_lazada', 'link_shopee', 'link_tokopedia'
    ];

    protected $primaryKey = 'id_produk';

    public function category(){
        return $this->belongsTo(Category::class, 'id_kategori', 'id_kategori');
    }

    public function order_detail()
    {
        return $this->hasMany(Order_Detail::class, 'id_produk', 'id_produk');
    }

    public function cart_detail()
    {
        return $this->hasMany(cart_detail::class, 'id_produk', 'id');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($product) { // before delete() method call this
            $product->order_detail()->each(function($order_detail) {
                $order_detail->delete(); // <-- direct deletion
            });

            $product->cart_detail()->each(function($cart_detail) {
                $cart_detail->delete(); // <-- direct deletion
            });

            // do the rest of the cleanup...
        });
    }
}
