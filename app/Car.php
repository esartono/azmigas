<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name', 'plate', 'tax', 'kir', 'stnk_expired'
    ];
}
