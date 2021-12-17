<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function login()
    {
        return view('user.pages.login.index');
    }
    public function register()
    {
        return view('user.pages.register.index');
    }
    public function tracking()
    {
        return view('user.pages.tracking.index');
    }
}
