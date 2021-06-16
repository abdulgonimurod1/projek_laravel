<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'messages';

    protected $primaryKey = 'id';

    protected $fillable = ['nama', 'email', 'subjek', 'telepon', 'Pesan'];
}
