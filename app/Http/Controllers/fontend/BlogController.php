<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function blog()
    {
        return view('user.blog.blog.index');
    }
    public function blogDetails()
    {
        return view('user.blog.blogDetails.index');
    }
}
