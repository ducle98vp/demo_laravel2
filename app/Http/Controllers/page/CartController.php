<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $products=Cart::content();
        $arr=[
            'categories'=>$categories,
            'products'=>$products,
        ];
        return view('page.layouts.cart',$arr);
    }
    public function add(Request $request,$id)
    {
        $product=Product::find($id);
        Cart :: add ([ 
            'id' => $id , 
            'name' => $product->title , 
            'qty' => 1 , 
            'price' => $product->price , 
            'weight' => 0 , 
            'options' => [ 'avatar' => $product->avatar ]]);
        return redirect()->Route('cart.index');
    }
    public function delete($id)
    {
        Cart::remove($id);
        return redirect()->Route('cart.index');
    }
    public function update(Request $request)
    {
        Cart::update($request->rowId,$request->quality);
    }
}
