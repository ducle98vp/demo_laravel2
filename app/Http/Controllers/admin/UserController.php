<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;
use App\Models\Users;
use App\Traits\Image;

class UserController extends Controller
{
    use Image;
    public function getLogin()
    {
        return view('admin.users.login');
    }
    public function postLogin(Request $request)
    {
        $arr=[
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($arr)) {
           return redirect()->route('categories.index');
        } else {
            return back()->with('error','Email hoặc Password ko chính xác');
        }
    }
    public function getSignup()
    {
        return view('admin.users.signup');
    }
    public function postSignup(Request $request)
    {
        $variable=$request->password;
        $rules=[
            'username'=>'bail|required|min:6|max:255',
            'password'=>'bail|required|min:6|max:255',
            'email'=>'bail|required|email|max:255|unique:users,email',
            'password_confirm'=>'bail|required|in:'.$variable,
            'phone'=>'bail|required'
        ];
        $messages=[
            'username.required'=>'Không được để trống user name',
            'username.min'=>'User name phải từ 6 ký tự',
            'username.max'=>'User name không được quá 255 ký tự',
            'password.required'=>'Password không được để trống',
            'password.min'=>'Password phải đủ 6 ký tự',
            'password.max'=>'Password không vượt quá 255 ký tự',
            'email.required'=>'Không được để trống trường email',
            'email.email'=>'Bạn cần nhập đúng định dạng email',
            'password_confirm.required'=>'Mời bạn nhập lại pass word',
            'password_confirm.in'=>'nhập lại password chưa đúng',
            'phone.required'=>'Bạn chưa nhập số điện thoại',
            'email.unique'=>'Email đã được sử dụng'
        ];
        $request->validate($rules,$messages);
        $password=bcrypt($request->password);
        $arr_inser=[
            'username'=>$request->username,
            'password'=>$password,
            'phone'=>$request->phone,
            'email'=>$request->email,
        ];
        $is_insert=Users::insert($arr_inser);
        if($is_insert)
        {
            return redirect()->route('users.login');
        }
        

    }
    public function editUser()
    {
        return view('admin.users.edit');
    }
    public function update(Request $request)
    {
        
        $check="";
        if(auth()->user()->email==$request->email)
        {
            $check="";
        }
        else{
            $check="|max:255|unique:users,email";
        }
        $rules=[
            'first_name'=>'bail|required|max:255',
            'last_name'=>'bail|required|max:255',
            'email'=>'bail|required|email'.$check,
            'phone'=>'bail|required',
            'address'=>'bail|required|max:255',
            'facebook'=>'bail|required|max:555',
            'avatar'=>'image',
        ];
        $messages=[
            'first_name.required'=>'Không được để trống first name',
            'first_name.max'=>'first name không được quá 255 ký tự',
            'last_name.required'=>'last_name không được để trống',
            'last_name.max'=>'last name không được quá 255 ký tự',
            'email.required'=>'Không được để trống trường email',
            'email.email'=>'Bạn cần nhập đúng định dạng email',
            'email.unique'=>'Email đã được sử dụng',
            'phone.required'=>'Bạn chưa nhập số điện thoại',
            'address.required'=>'Không được để trống address',
            'address.max'=>'address không được quá 255 ký tự',
            'facebook.required'=>'Không được để trống facebook',
            'facebook.max'=>'facebook không được quá 255 ký tự',

            
        ];
        $request->validate($rules,$messages);
        $user=Auth::user();
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->phone=$request->phone;
        $user->facebook=$request->facebook;
        $user->address=$request->address;
        $user->email=$request->email;
        $user->avatar=$this->uploadImage($request->avatar);
        $user->save();
        return back();
    }
    public function getLogout()
    {
        Auth::logout();
        return view('admin.users.login');
    }

}
