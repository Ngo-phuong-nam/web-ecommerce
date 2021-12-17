<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
class BrandController extends Controller
{
    //
    public function index()
    {
        $brand = BrandModel::all();
        return view('admin.brand.showBrand')->with('brand',$brand);
    }
    public function create()
    {
        return view('admin.brand.addBrand');

    }
    // Thêm danh mục
    public function store(Request $request)
    {
        $this->validate($request, [
            'brand_name' => 'required',
            'brand_desc' => 'required',
            'brand_status' => 'required',
        ]);
        $brand = new BrandModel;
        $brand->brand_name= $request->input('brand_name');
        $brand->brand_desc= $request->input('brand_desc');
        $brand->brand_status= $request->input('brand_status');             
        if($brand->save())
        {
            Alert::success('Success Title', 'Success Message');
        }
        else
        {
            Alert::error('Error Title', 'Error Message');
        }
        return Redirect::to('admin/list-brand');
    }
    public function show($id)
    {
        BrandModel::where('brand_id', $id)->update(['brand_status'=>1]);
        return Redirect::to('admin/list-brand');
    }
    public function hide($id)
    {
        BrandModel::where('brand_id', $id)->update(['brand_status'=>0]);
        return Redirect::to('admin/list-brand');
    }
    public function edit($id)
    {       
        $data = BrandModel::where('brand_id',$id)->get();
        $brand = view('admin.brand.editbrand')->with('brand', $data);      
        return view('admin_layout')->with('admin.brand.editBrand',$brand);
    }
    //Sửa
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'brand_name' => 'required',
            'brand_desc' => 'required',
        ]);
        $brand = BrandModel::find($id);
        $brand->brand_name= $request->input('brand_name');
        $brand->brand_desc =$request->input('brand_desc');
        $brand->update();
        return Redirect::to('admin/list-brand');
    }
    //Xóa
    public function destroy($id)
    {
        BrandModel::where('brand_id', $id)->delete();
        return Redirect::to('admin/list-brand');
    }
}
