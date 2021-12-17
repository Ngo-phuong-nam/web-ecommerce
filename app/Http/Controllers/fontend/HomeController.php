<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;
class HomeController extends Controller
{
    //
    public function index()
    {
        $category = CategoryModel::where('category_status','1')->get();
        $brand = BrandModel::where('brand_status','1')->get();
        $product = ProductModel::where('product_status','1')->get();
        return view('user.home.index')->with('category',$category)->with('brand',$brand)->with('product',$product);
    }
    public function indexContact()
    {
        return view('user.contact.index');
    }
    public function admin()
    {
        return view('admin.dasboard.index');
    }
}
