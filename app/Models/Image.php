<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    protected $fillable = ['path' , 'product_detail_id'];

    public function product_details(){
        return $this->BelongsTo(Product_Detail::class , 'product_detail_id' );
    }
}
