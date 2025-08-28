<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'status', 'payment_method', 'payment_status', 'total'];

    public function order_items()
    {
        return $this->hasMany(Order_Item::class);
    }

    public function orderItem(){
        return $this->hasOne(Order_Item::class)->where('user_id' , Auth::id());
    }

    public function returns()
    {
        return $this->hasMany(Refund_Request::class);
    }
}
