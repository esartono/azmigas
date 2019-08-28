<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProductTransaction extends Model
{
    protected $fillable = [
        'name', 'is_sale', 'add', 'minus'
    ];

    public function product_add()
    {
        return $this->belongsTo(Product::class, 'add', 'id');
    }

    public function product_minus()
    {
        return $this->belongsTo(Product::class, 'minus', 'id');
    }

    public static function products($is_sale)
    {
        $products = static::where('is_sale', $is_sale)->pluck('name', 'id');
        $products->prepend('Pilih Tipe ...', 0);
        return $products;
    }

}
