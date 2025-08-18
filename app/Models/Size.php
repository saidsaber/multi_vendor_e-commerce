<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['name', 'product_id'];

    public function product_details()
    {
        return $this->hasMany(Product_Detail::class);
    }
}
