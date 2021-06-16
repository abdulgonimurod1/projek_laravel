<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    protected $table = 'penawarans';

    protected $primaryKey = 'kode_penawaran';

    protected $fillable = ['id_produk', 'nama', 'alamat', 'email', 'nomer_wa'];
    
    public function produk(){
        return $this->belongsTo(Product::class, 'id_produk', 'id_produk');
    }
}
