<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['invoice','user_id','total_harga', 'status_pemesanan'];

    protected $primaryKey = 'order_id';

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
