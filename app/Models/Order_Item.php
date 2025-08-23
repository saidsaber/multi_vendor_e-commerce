<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    protected $table = 'order_items';
    protected $fillable = ['order_id' , 'product_detail_id' , 'quantaty' , 'price'];
}
