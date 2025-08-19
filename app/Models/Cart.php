<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id' , 'product_detail_id' , 'quantaty'];

    public function productDetail(){
        return $this->belongsTo(Product_Detail::class);
    }
}
