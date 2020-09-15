<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function filter_categories(Request $request,$id)
    {
        
        $categories=Category::all();
        $products=Product::where('category_id',$id);
        if(isset($request->price))
        {
            $price=$request->price;
            switch($price)
            {
                case '0:100000':
                    $products=$products->where('price','<',100000);
                    break;
                case '100000:200000': 
                    $products=$products->whereBetween('price',[100000,200000]);
                break;
                case '200000:300000': 
                    $products=$products->whereBetween('price',[200000,300000]);
                break;
                case '300000:500000': 
                    $products=$products->whereBetween('price',[300000,500000]);
                break;
                case '500000:600000': 
                    $products=$products->whereBetween('price',[500000,600000]);
                break;
                case '600000:max': 
                    $products=$products->whereBetween('price','>',600000);
                break;
    
            }
        }
        $products=$products->get();
        $category_id=$request->id;
        $arr=[
            'categories'=>$categories,
            'products'=>$products,
            'category_id'=>$category_id
        ];
        return view('page.layouts.filter',$arr);
    }
   
    
}
