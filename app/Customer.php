<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'phone', 'address', 'email'
    ];

    public static function konsumen()
    {
        $konsumen = static::pluck('name','id');
        $konsumen->prepend('Pilih Konsumen ...', 0);
        return $konsumen;
    }

    public static function namaKonsumen($id)
    {
       return static::where('id', '=', $id)->value('name');
    }
}
