<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $category = CategoryModel::all();
        return view('admin.category.showCategory')->with('category',$category);
    }
    public function create()
    {
        return view('admin.category.addCategory');

    }
    // Thêm danh mục
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'category_desc' => 'required',
            'category_status' => 'required',
        ]);
        $category = new CategoryModel;
        $category->category_name= $request->input('category_name');
        $category->category_desc= $request->input('category_desc');
        $category->category_status= $request->input('category_status');             
        $category->save();
        return Redirect::to('admin/list-category');
    }
    public function show($id)
    {
        CategoryModel::where('category_id', $id)->update(['category_status'=>1]);
        return Redirect::to('admin/list-category');
    }
    public function hide($id)
    {
        CategoryModel::where('category_id', $id)->update(['category_status'=>0]);
        return Redirect::to('admin/list-category');
    }
    public function edit($id)
    {
        $data = CategoryModel::where('category_id',$id)->get();
        $category = view('admin.category.editCategory')->with('category', $data);      
        return view('admin_layout')->with('admin.category.editCategory',$category);
    }
    //Sửa
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'category_desc' => 'required',
        ]);
        $category = CategoryModel::find($id);
        $category->category_name = $request->input('category_name');
        $category->category_desc = $request->input('category_desc');
        $category->update();
        return Redirect::to('admin/list-category');
    }
    //Xóa
    public function destroy($id)
    {
        CategoryModel::where('category_id', $id)->delete();
        return Redirect::to('admin/list-category');
    }

}
