<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bidding extends Model
{
    protected $table = 'biddings';

    protected $fillable = ['kode_pemesanan','nama', 'whatsapp', 'email', 'status_penawaran'];

    protected $primaryKey = 'kode_penawaran';

    public function user()
    {
        return $this->belongsTo(User::class, 'kode_penawaran', 'id');
    }

}
