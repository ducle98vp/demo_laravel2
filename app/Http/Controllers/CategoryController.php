<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories= Category::all();
    	return view('categories.index',compact('categories'));
	}
	public function update($id)
	{
		$category= Category::findOrFail($id);
		return view('categories.edit',compact('category'));
		
		
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
		return view('categories.create');
	}
	public function store(Request $request)
	{
		$arr_insert=[
			'name'=>$request->input('name'),
		];
		Category::insert($arr_insert);
		return redirect()->route('categories.index');
		
	}
	public function delete($id)
	{
		$category=Category::findOrFail($id);
		$category->delete();
		return redirect()->route('categories.index');

	}

	
}
