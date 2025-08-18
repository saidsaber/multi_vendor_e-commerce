<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Review extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
