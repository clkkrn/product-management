<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function subproducts()
    {
        return $this->belongsToMany(Product::class,'sub_products','item_id','product_id');
    }
}
