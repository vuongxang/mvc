@extends('layouts.main')
@section('title', 'Danh sách danh mục')

@section('content')

<h3>Danh sách danh mục</h3>
<p class="text-danger">@if(isset($_GET['msg'])) {{ $_GET['msg'] }} @endif</p>
<table class="table table-hover">
    <thead>
        <th>ID</th>
        <th>Cate Name</th>
        <th>Total Product</th>
        <th>Show menu</th>
        <th>
            <a class="btn btn-sm btn-success" href="add-cate">Tạo mới</a>
        </th>
    </thead>
    <tbody>

        @foreach ($cates as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->cate_name}}</td>
                <td>{{count($item->products)}}</td>
                <td>{{ $item->show_menu == 1 ? "Yes" : "No" }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{BASE_URL . 'edit-cate?id=' . $item->id}}">Edit</a>
                    <a class="btn btn-sm btn-danger" href="{{BASE_URL . 'remove-cate?id=' . $item->id}}" onclick="return confirm('Bạn chắc muốn xóa?')">Remove</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection