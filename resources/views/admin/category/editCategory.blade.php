@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="card shadow mb-4 p-4">
            <h1 class="h3 mb-2 text-gray-800">Danh sách loại sản phẩm</h1>
            @foreach ($category as $key => $item)
                <form method="POST" role="form" action="{{ URL::to('admin/update-category/' . $item->category_id) }}">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="p-2">Tên danh mục</label>
                        <input type="text" name="category_name" value="{{ $item->category_name }}"
                            class="form-control" id="exampleFormControlInput1" placeholder="Tên danh mục..." />
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="p-2">Mô tả</label>
                        <textarea name="category_desc" class="form-control" id="exampleFormControlTextarea1"
                            rows="4">{{ $item->category_desc }}</textarea>
                    </div>
                    <hr/>                   
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            @endforeach

        </div>
    </div>
@endsection
