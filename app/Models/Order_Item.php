<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    protected $table = 'order_items';
    protected $fillable = ['vendor_order_id','order_id' , 'product_detail_id' , 'quantaty' , 'price' , 'status'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function vendorOrder(){
        return $this->belongsTo(Vendor_Order::class  , 'vendor_order_id');
    }

    public function product_detail(){
        return $this->belongsTo(Product_Detail::class , 'product_detail_id' );
    }

    public function refund_requests(){
        return $this->hasMany(Refund_Request::class , 'order_item_id');
    }
}
