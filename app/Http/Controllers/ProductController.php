<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Traits\Image;

class ProductController extends Controller
{
    use Image;
    public function index()
    {
        $products=Product::all();
        $products=Product::paginate(4);
        return view('products.index',compact('products'));
    }
    public function create()
    {

        $categories=Category::all();
        return view('products.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $rules=[
            'name'=>'bail|required|min:3|max:255',
            'price'=>'required',
            'avatar'=>'image',
            'summary'=>'required',
        ];
        $messages=[
            'name.required'=>'Name ko được để trống',
            'name.min'=>'Name ít nhất 3 ký tự',
            'name.max'=>'Name không vượt quá 255 ký tự',
            'price.required'=>'Price không được để trống',
            'avatar.image'=>'avatar phải có dạng ảnh',
            'summary.required'=>'Summary không được để trống',
        ];
        $request->validate($rules,$messages);
        $avatar=$this->uploadImage($request->avatar);    
        $arr_insert=[
            'title'=>$request->name,
            'category_id'=>$request->category,
            'price'=>$request->price,
            'avatar'=>$avatar,
            'summary'=>$request->summary,
            'status'=>$request->status
        ];
        
        $is_insert=Product::insert($arr_insert);
        if($is_insert)
        {
            $request->session()->flash('success','Thêm mới sản phẩm thành công');
        }
        else
        {
            $request->session()->flash('error','Thêm mới thất bại');
        }
        
        return redirect()->route('products.index');
       
		
       
    }
    public function edit($id)
    {
        $product=Product::findOrFail($id);
        $categories=Category::all();
        $arr=[
            'product'=>$product,
            'categories'=>$categories,
        ];
        
        return view('products.edit',$arr);
        
    }
    public function update(Request $request ,$id)
    {
        $product=Product::fineOrFail($id);
        $product->title=$request->name;
        $product->category_id=$request->category;
        $product->price=$request->price;
        $product->avatar=$request->avatar;
        $product->summary=$request->summary;
        $product->status=$request->status;
        $is_update=$product->save();
        
        if($is_update)
        {
            $request->session()->flash('success','Update thành công');
        }
        else
        {
            $request->session()->flash('error','Update thất bại');
        }

       
        
    }
    public function delete($id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');

    }
}
