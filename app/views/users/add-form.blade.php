@extends('layouts.main')
@section('title','Thêm sản phẩm')
@section('content')
<h3 class="text-center">Tạo mới sản phẩm</h3>
<form action="{{BASE_URL . 'save-add-user'}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Quyền</label>
                        <select name="role" class="form-control">
                            <option value="1">Admin</option>
                            <option value="0">Customer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Ảnh đại diện</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                </div>
                
                    
                <div class=" col-12 text-center">
                    <button type="submit" class="btn btn-info">Lưu</button>
                    <a href="{{BASE_URL}}" class="btn btn-danger">Hủy</a>
                </div>
            </div>
        </form>
    </div>
@endsection