@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="card shadow mb-4 p-4">
            <h1 class="h3 mb-2 text-gray-800">Thêm sản phẩm</h1>
            @foreach ($product as $key => $item)
            <form method="POST" action="{{URL::to('admin/update-product/' .$item->product_id )}}" encType="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">                  
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" name="product_name" type="text"
                                placeholder="Enter your product name" value="{{$item->product_name}}" />
                            <label>Tên sản phẩm</label>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" name="product_price" type="text"
                                placeholder="Enter your last name" value="{{$item->product_price}}" />
                            <label>Giá</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3 ">
                    <div class="form-floating">
                        <input class="form-control" type="file" name="product_img">
                        <img height="100px" width="110px" src="{{URL::to($item->product_img)}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <textarea class="form-control" type="text"
                                placeholder="Enter your product name" name="product_desc">{{$item->product_desc}}</textarea>
                            <label>Mô tả</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <textarea class="form-control" type="text"
                                placeholder="Enter your last name" name="product_content">{{$item->product_content}}</textarea>
                            <label>Nội dung</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <select class="form-control" name="category_id">
                                <option>Chọn danh mục</option>
                                @foreach ($category as $key => $cate)
                                        @if($cate->category_id === $item->product_id)
                                            <option  value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @else
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endif
                                @endforeach
                            </select>
                            <label>Category</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <select class="form-control" name="brand_id">
                                <option>Chọn thương hiệu</option>
                                @foreach ($brand as $key => $brand)
                                    @if($brand->brand_id === $item->product_id)
                                        <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                    @else
                                        <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label>Brand</label>
                        </div>
                    </div>
                </div>
                <hr/>
                <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
            </form>
            @endforeach
        </div>
    </div>
@endsection
