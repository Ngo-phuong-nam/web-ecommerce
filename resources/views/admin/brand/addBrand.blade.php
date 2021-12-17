@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="card shadow mb-4 p-4">
            <h1 class="h3 mb-2 text-gray-800">Danh sách loại sản phẩm</h1>
            <form method="post" role="form" action="{{URL::to('admin/save-brand')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="p-2">Tên danh mục</label>
                    <input type="text" name="brand_name" class="form-control" id="exampleFormControlInput1" placeholder="Tên danh mục...">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="p-2">Mô tả</label>
                    <textarea name="brand_desc" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1" class="p-2">Trạng thái</label>
                    <select class="form-control" name="brand_status" id="exampleFormControlSelect1">
                        <option value="0">Ẩn</option>
                        <option value="1">Hiện</option>
                    </select>
                </div>
                <hr/> 
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
@endsection
