<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   public function products()
   {
       // một danh mục có nhiều sản phẩm
       return $this->hasMany('App\Models\Product','category_id','id');//(model,khóa ngoại,khóa chính)
   }
}
