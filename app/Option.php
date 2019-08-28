<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'option'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function tipeGas()
    {
        $options = static::pluck('option', 'id');
        $options->prepend('Pilih Tipe ...', 0);
        return $options;
    }
}
