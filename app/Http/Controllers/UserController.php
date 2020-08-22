<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;

class UserController extends Controller
{
    public function getLogin()
    {
        return view('users.login');
    }
    public function postLogin(Request $request)
    {
        $arr=[
            'email' => $request->email, 'password' => $request->password
        ];
        if (Auth::attempt($arr)) {
           return redirect()->route('categories.index');
        }
        else
        {
            
            $request->session()->flash('error','Email hoặc Password ko chính xác');
            return back();
            
        }
    }
}
