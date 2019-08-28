<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'date', 'vehicle_id', 'driver_id', 'route_out', 'route_in', 'note', 'charge', 'user_id'
    ];

    protected $casts = [
        'route_out' => 'array',
        'route_in' => 'array',
    ];
}