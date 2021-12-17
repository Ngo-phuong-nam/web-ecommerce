<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    //
    public function index()
    {
        $product = ProductModel::leftJoin('category', 'category.category_id', '=', 'product.category_id')
        ->leftJoin('brand', 'brand.brand_id', '=', 'product.brand_id')
        ->select('brand.brand_name', 'category.category_name', 'product.product_id',
            'product.product_name', 'product.product_price', 'product.product_content', 'product.product_desc',
            'product.product_status', 'product.category_id', 'product.brand_id', 'product.product_img')
        ->get();
        return view('admin.product.showProduct')->with('product',$product);       
    }
    public function create()
    {
        $category = CategoryModel::where('category_status','1')->get();
        $brand = BrandModel::where('brand_status','1')->get();
        return view('admin.product.addProduct')->with('category',$category)->with('brand',$brand);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name'=>'required',
            'product_desc'=>'required',
            'product_content'=>'required',
            'product_price'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'product_status'=>'required',
            'product_img'=>'required|image|mimes:jpeg,jpg,png|max:2048',            
        ]);
        $product = new ProductModel;
        $product->product_name= $request->input('product_name');
        $product->product_desc= $request->input('product_desc');
        $product->product_content= $request->input('product_content');
        $product->product_price= $request->input('product_price');
        $product->category_id= $request->input('category_id');
        $product->brand_id= $request->input('brand_id');
        $product->product_status= $request->input('product_status');
        if($request->hasFile('product_img'))
        {
            $file = $request->file('product_img');
            $extension =$file->getClientOriginalExtension();
            $fileName = time(). '.' .$extension;
            $file->move('upload/products/', $fileName);
            $product->product_img ='upload/products/' .$fileName;
        }
        $product->save();
        return Redirect::to('admin/list-product');
    }
    public function show($id)
    {
        ProductModel::where('product_id', $id)->update(['product_status'=>1]);
        return Redirect::to('admin/list-product');
    }
    public function hide($id)
    {
        ProductModel::where('product_id', $id)->update(['product_status'=>0]);
        return Redirect::to('admin/list-product');
    }
    public function edit($id)
    {
        $category = CategoryModel::where('category_status','1')->orderby('category_id','desc')->get();
        $brand = BrandModel::where('brand_status','1')->orderby('brand_id','desc')->get();
        $product = ProductModel::where('product_id',$id)->get();
        $data = view('admin.product.editProduct')->with('category',$category)->with('brand',$brand)->with('product',$product);    
        return view('admin_layout')->with('admin.product.editProduct',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name'=>'required',
            'product_desc'=>'required',
            'product_content'=>'required',
            'product_price'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',          
        ]);
        $product = ProductModel::find($id);
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_content = $request->input('product_content');
        $product->product_desc = $request->input('product_desc');

        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
            if ($request->hasFile('product_img'))
            {
                $path = $product->product_img;
                if(File::exists($path)) 
                {
                    File::delete($path);
                }
                    $file = $request->file('product_img');
                    $extension = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $extension;
                    $file->move('upload/product/', $fileName);
                    $product->product_img = 'upload/product/' . $fileName;
            }
            $product->update();
            return Redirect::to('admin/list-product');                         
    }
    public function destroy($id)
    {
        ProductModel::where('product_id', $id)->delete();
        return Redirect::to('admin/list-product');
    }
}
