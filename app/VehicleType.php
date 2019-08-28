<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $fillable = [
        'name'
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public static function tipe()
    {
        $options = static::pluck('name', 'id');
        $options->prepend('Pilih Tipe ...', 0);
        return $options;
    }
}
