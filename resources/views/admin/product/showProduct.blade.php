@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="card shadow mb-4 p-4">
            <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
                        <tr>
                            <th scope="row">{{ $item->product_id }}</th>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->product_price }}</td>
                            <td><img height="70px" width="80px" src="{{URL::to( $item->product_img) }}"></td>
                            <td>{{ $item->category_name }}</td>
                            <td>{{ $item->brand_name }}</td>
                            <td><?php
                                if($item->product_status === 0){                                                                  
                                ?>
                                <a href="{{ URL::to('admin/show-product/' . $item->product_id) }}"
                                    class="btn btn-light">Ẩn</a>
                                <?php
                                }else {                              
                                ?>
                                <a href="{{ URL::to('admin/hide-product/' . $item->product_id) }}"
                                    class="btn btn-dark">Hiện</a>
                                <?php                             
                                }
                                ?></td>
                            <td><a href="{{ URL::to('admin/edit-product/' .$item->product_id) }}" class="btn btn-success">Edit</a></td>
                            <form method="post" action="{{ URL::to('admin/delete-product/' . $item->product_id) }}">
                                @csrf
                                @method('delete')
                                <td><button type="submit" onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger">Delete</button></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
