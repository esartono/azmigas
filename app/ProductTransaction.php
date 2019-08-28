<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductTransaction extends Model
{
    protected $fillable = [
        'date', 'customer_transaction_id', 'customer_id', 'supplier_id', 'product_id', 'is_sale', 'value', 'price', 'total', 'note', 'user_id'
    ];

    public function produks()
    {
        return $this->belongsTo(TypeProductTransaction::class, 'product_id', 'id');
    }

    public function konsumen()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function pemasok()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public static function total_transaksi_harian($d, $id_produk, $jual)
    {
        if ($jual == 0) {
            $id_product = TypeProductTransaction::where('add', $id_produk)->pluck('id');
        }
        
        if ($jual == 1) {
            $id_product = TypeProductTransaction::where('minus', $id_produk)->pluck('id');
        }

        $total = 0;
        
        if($id_product){
            $total = static::select(DB::raw('SUM(value) as total_transaksi_harian'))
                    ->where('date', $d)
                    ->where('product_id', $id_product)
                    ->where('is_sale', $jual)
                    ->first()
                    ->total_transaksi_harian
                    ;
        }
        
        return $total;

    }
}
