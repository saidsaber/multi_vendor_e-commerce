<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Review extends Model
{
    protected $table = 'product_reviews';
    protected $fillable = ['user_id' , 'product_id' , 'rating' , 'comment'];
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
