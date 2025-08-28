<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product_Detail extends Model
{
    protected $table = 'product_details';
    protected $fillable = ['product_id', 'size_id', 'color_id', 'price', 'stock', 'status'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_detail_id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_detail_id');
    }
    public function refund_requests()
    {
        return $this->hasMany(Refund_Request::class, 'product_detail_id');
    }
    public function cartForUser()
    {
        return $this->hasOne(Cart::class, 'product_detail_id')->where('user_id', Auth::id());
    }

    public function order_items()
    {
        return $this->hasMany(Order_Item::class, 'order_id');
    }

}
