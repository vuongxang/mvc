@extends('layouts.main')
@section('title', 'PT15211-web - Trang chủ')
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="{{BASE_URL . 'public/uploads/users.jpg'}}" class="home-card-img card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Hiện có {{$users}} tài khoản</h5>
                    <a href="{{BASE_URL . 'tai-khoan'}}" class="btn btn-primary">Chi tiết</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="{{BASE_URL . 'public/uploads/categories.png'}}" class="home-card-img card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Hiện có {{$cates}} danh mục</h5>
                    <a href="{{BASE_URL . 'danh-muc'}}" class="btn btn-primary">Chi tiết</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="{{BASE_URL . 'public/uploads/products.png'}}" class="home-card-img card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Hiện có {{$products}} sản phẩm</h5>
                    <a href="{{BASE_URL . 'sản phẩm'}}" class="btn btn-primary">Chi tiết</a>
                </div>
            </div>
        </div>
    </div>
@endsection