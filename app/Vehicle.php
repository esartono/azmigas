<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'name', 'vehicle_type_id', 'plate', 'tax', 'kir', 'stnk_expired'
    ];
}
