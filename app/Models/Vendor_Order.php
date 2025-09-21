<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor_Order extends Model
{
    protected $table = 'vendor_orders';
    protected $fillable = ['order_id' , 'store_id'];

    public function orderItems(){
        return $this->hasMany(Order_Item::class);
    }
}
