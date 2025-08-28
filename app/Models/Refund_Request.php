<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refund_Request extends Model
{
    protected $table = 'refund_request';
    protected $fillable = ['user_id', 'order_id', 'product_detail_id', 'reason', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product_detail()
    {
        return $this->belongsTo(Product_Detail::class);
    }
}
