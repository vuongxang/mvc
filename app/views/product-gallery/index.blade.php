@extends ('layouts.main')
@section('title','Danh sách sản phẩm')


@section('content')

<p class="text-danger">@if(isset($_GET['msg'])) {{ $_GET['msg'] }} @endif</p>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Sản phẩm</th>
            <th>
            <a href="./add-gallery?product-id={{$_GET['product-id']}}" class="btn btn-success">Add new</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gallerys as $item)
            <tr>
            <td>{{$item->id}}</td>
            <td><img src="{{$item->img_url}}" alt="" width="70"></td>
            <td>{{$item->product_id}}</td>
            <td>
                <a href="">Sửa</a>
                <a href="./delete-gallery?id={{$item->id}}">Xóa</a>
            </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection