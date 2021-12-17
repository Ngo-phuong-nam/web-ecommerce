@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="card shadow mb-4 p-4">
            <h1 class="h3 mb-2 text-gray-800">Thêm sản phẩm</h1>
            <form method="post" role="form" action="{{URL::to('admin/save-product')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" name="product_name" type="text"
                                placeholder="Enter your product name" />
                            <label>Tên sản phẩm</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" name="product_price" type="text"
                                placeholder="Enter your last name" />
                            <label>Giá</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3 ">
                    <div class="form-floating">
                        <input class="form-control" type="file" name="product_img">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <textarea class="form-control" type="text"
                                placeholder="Enter your product name" name="product_desc"></textarea>
                            <label>Mô tả</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <textarea class="form-control" type="text"
                                placeholder="Enter your last name" name="product_content"></textarea>
                            <label>Nội dung</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <select class="form-control" name="category_id">
                                <option>Chọn danh mục</option>
                                @foreach ($category as $key => $item)
                                    <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                            <label>Category</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <select class="form-control" name="brand_id">
                                <option>Chọn thương hiệu</option>
                                @foreach ($brand as $key => $item)
                                    <option value="{{ $item->brand_id }}">{{ $item->brand_name }}</option>
                                @endforeach
                            </select>
                            <label>Brand</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <div class="form-floating mb-3 mb-md-0">
                        <select class="form-control" name="product_status">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiện</option>
                        </select>
                        <label>Status</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            </form>
        </div>
    </div>
@endsection
