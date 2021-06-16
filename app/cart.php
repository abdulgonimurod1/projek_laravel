<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public function cart_detail()
    {
        return $this->hasMany(cart_detail::class, 'cart_id', 'id');
    }
    
     public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id_produk');
    }
    
    public static function boot() {
        parent::boot();
        self::deleting(function($cart) { // before delete() method call this
            $cart->cart_detail()->each(function($cart_detail) {
                $cart_detail->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
