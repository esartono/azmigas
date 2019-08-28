<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'nik', 'name', 'jk', 'birth_place', 'birth_date', 'address', 'phone1', 'phone2', 'status'
    ];

    public function drivers()
    {
        return $this->hasOne(Driver::class);
    }

}
