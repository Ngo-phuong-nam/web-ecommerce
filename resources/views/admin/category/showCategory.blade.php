@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="card shadow mb-4 p-4">
            <h1 class="h3 mb-2 text-gray-800">Danh sách loại sản phẩm</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $key => $cate)
                        <tr>
                            <th scope="row">{{ $cate->category_id }}</th>
                            <td>{{ $cate->category_name }}</td>
                            <td>
                                <?php
                                if($cate->category_status === 0){                                                                  
                                ?>
                                <a href="{{ URL::to('admin/show-category/' . $cate->category_id) }}"
                                    class="btn btn-light h-25 w-25 text-center btn-sm">Ẩn</a>
                                <?php
                                }else {                              
                                ?>
                                <a href="{{ URL::to('admin/hide-category/' . $cate->category_id) }}"
                                    class="btn btn-dark h-25 w-25 text-center btn-sm">Hiện</a>
                                <?php                             
                                }
                                ?>
                            </td>
                            <td><a href="{{ URL::to('admin/edit-category/' . $cate->category_id) }}"
                                    class="btn btn-success btn-sm">Edit</a></td>
                            <form method="post" action="{{ URL::to('admin/delete-category/' . $cate->category_id) }}">
                                @csrf
                                @method('delete')
                                <td><button type="submit" class="btn btn-danger">Delete</button></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
