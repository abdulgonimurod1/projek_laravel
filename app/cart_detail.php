<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart_detail extends Model
{
    
    public function cart()
    {
        return $this->belongsTo(cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
