<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
		$categories= Category::all();
		$categories= Category::paginate(3);
    	return view('admin.categories.index',compact('categories'));
	}
	public function update($id)
	{
		$category= Category::findOrFail($id);
		return view('admin.categories.edit',compact('category'));
		
		
	}
	public function edit(Request $request,$id)
	{
		$category= Category::findOrFail($id);
		$category->name=$request->input('name');
		$category->save();
		return redirect()->route('categories.index');

	}
	public function create()
	{
		return view('admin.categories.create');
	}
	public function store(Request $request)
	{
		$arr_insert=[
			'name'=>$request->input('name'),
		];
		$is_insert=Category::insert($arr_insert);
		if($is_insert)
        {
            $request->session()->flash('success','Thêm mới danh mục thành công');
        }
        else
        {
            $request->session()->flash('error','Thêm mới thất bại');
		}
		
		return redirect()->route('categories.index');

		
	}
	public function delete($id)
	{
		$category=Category::findOrFail($id);
		$category->delete();
		return redirect()->route('categories.index');

	}

	
}
