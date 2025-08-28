<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    protected $table = 'order_items';
    protected $fillable = ['order_id' , 'product_detail_id' , 'quantaty' , 'price'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product_detail(){
        return $this->belongsTo(Product_Detail::class , 'product_detail_id' );
    }
}
