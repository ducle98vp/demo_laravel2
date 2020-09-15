<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class DetailController extends Controller
{
    public function index($id)
    {
        $product=Product::find($id);
        $categories=Category::all();
        $arr=[
            'product'=>$product,
            'categories'=>$categories
        ];
        return view('page.layouts.detail',$arr);
    }
}
