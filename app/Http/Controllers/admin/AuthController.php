<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard.index');
    }
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('admin');
        } else {
            return view('admin.authen.login.index');
        }
        
    }
    public function postLogin(request $request)
    {   
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'roles'    =>1
        ];
        if (Auth::attempt($login)) {
        return redirect('admin')->with('name',Auth::User()->name);
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return view('admin.authen.login.index');
    }
}
