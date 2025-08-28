<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wish_List extends Model
{
    protected $table = 'wish_lists';
    protected $fillable = ['user_id' , 'product_id'];

    public function product(){
        return $this->belongsTo(Product::class );
    }
}
