<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Web_View extends Model
{
    protected $table = 'web_view';

    protected $primaryKey = 'id';

    protected $fillable = ['Nama', 'view'];
}
