<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'option_id', 'stock', 'price'
    ];

    public function product_transactions()
    {
        return $this->hasMany(ProductTransaction::class);
    }

    public function options()
    {
        return $this->belongsTo(Option::class, 'option_id', 'id');
    }

    public static function tipeProduk()
    {
        $options = static::pluck('name', 'id');
        $options->prepend('Pilih Tipe ...', 0);
        return $options;
    }

}
