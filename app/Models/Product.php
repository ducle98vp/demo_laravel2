<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        //một sản phẩm chỉ thuộc về 1 danh mục
        return $this->belongsTo('App\Models\Category');
    }
}
