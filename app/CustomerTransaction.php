<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerTransaction extends Model
{
    protected $fillable = [
        'date', 'customer_id', 'is_sale', 'total', 'note', 'user_id'
    ];

    public function konsumen()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function transaksi()
    {
        return $this->hasMany(ProductTransaction::class, 'customer_transaction_id', 'id');
    }

}
