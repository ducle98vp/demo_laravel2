<?php

namespace App\Http\Controllers\page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $products=Product::all();
        $categories=Category::all();
        $news=DB::table('news')->orderBy('id','desc')->limit(3)->get();
        $products_new=DB::table('products')->orderBy('created_at','desc')->get();
       
        $arr=[
            'products' => $products,
            'categories' => $categories,
            'products_new'=>$products_new,
            'news'=>$news
            
        ];
        return view('page.layouts.home',$arr);
    }
}
