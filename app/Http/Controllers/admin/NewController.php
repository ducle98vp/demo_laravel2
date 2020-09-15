<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Traits\Image;
use Illuminate\Support\Facades\DB;
class NewController extends Controller
{
    use Image;
    public function index()
    {
        $news=News::all();
        $news=NEWS::paginate(4);
        return view('admin.news.index',compact('news'));
    }
    public function create()
    {
        return view('admin.news.create');
    }
    public function store(Request $request)
    {
        $rules=[
            'name'=>'bail|required|min:3|max:255',
            'avatar'=>'image',
            'summary'=>'required',
            'content'=>'required',
        ];
        $messages=[
            'name.required'=>'Name ko được để trống',
            'name.min'=>'Name ít nhất 3 ký tự',
            'name.max'=>'Name không vượt quá 255 ký tự',
            'content.required'=>'Content không được để trống',
            'avatar.image'=>'avatar phải có dạng ảnh',
            'summary.required'=>'Summary không được để trống',  
        ];
        $request->validate($rules,$messages);
        $avatar=$this->uploadImage($request->avatar);    
        $arr_insert=[
            'title'=>$request->name,
            'avatar'=>$avatar,
            'summary'=>$request->summary,
            'status'=>$request->status,
            'content'=>$request->content
        ];
        
        $is_insert=News::insert($arr_insert);
        if($is_insert)
        {
            $request->session()->flash('success','Thêm mới tin tức thành công');
        }
        else
        {
            $request->session()->flash('error','Thêm mới thất bại');
        }
        
        return redirect()->route('new.index');
    }
    public function edit($id)
    {
        $new=news::find($id);
        return view('admin.news.edit',compact('new'));
    }
    public function update(Request $request,$id)
    {
        $rules=[
            'name'=>'bail|required|min:3|max:255',
            'avatar'=>'image',
            'summary'=>'bail|required|max:255',
            'content'=>'required',
        ];
        $messages=[
            'name.required'=>'Name ko được để trống',
            'name.min'=>'Name ít nhất 3 ký tự',
            'name.max'=>'Name không vượt quá 255 ký tự',
            'content.required'=>'Content không được để trống',
            'avatar.image'=>'avatar phải có dạng ảnh',
            'summary.required'=>'Summary không được để trống', 
            'summary.max'=>'Summary ko vượt quá 255 ký tự' 
        ];
        $request->validate($rules,$messages);
        $new=news::find($id);
        
        if(!empty($request->avatar))
        {
            $new->avatar=$this->uploadImage($request->avatar);
        }
        $new->title=$request->name;
        $new->summary=$request->summary;
        $new->content=$request->content;
        $new->status=$request->status;
        $is_update=$new->save();
        if($is_update)
        {
            return redirect()->Route('new.index')->with('success','update thành công');
        }
        else
        {
            return redirect()->Route('new.index')->with('error','update thất bại thử lại sau');
        }
        


    }
    public function delete($id)
    {
        $new=News::find($id);
        $is_delete=$new->delete();
        if($is_delete)
        {
            return redirect()->Route('new.index')->with('success','Xóa thành công');
        }
        else
        {
            return redirect()->Route('new.index')->with('error','Xóa thất bại');   
        }
    }
    public function destroy(Request $request,$id)
    {

    }
}
