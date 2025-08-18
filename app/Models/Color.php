<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['color', 'hex_code', 'product_id'];

    public function product_details()
    {
        return $this->hasMany(Product_Detail::class);
    }
}
