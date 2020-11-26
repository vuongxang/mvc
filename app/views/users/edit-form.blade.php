@extends('layouts.main')
@section('title','Cập nhật sản phẩm')
@section('content')
<h3 class="text-center">Cập nhật sản phẩm</h3>
<form action="{{BASE_URL . 'save-edit-user?id='.$model->id}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="name" class="form-control" value=" {{$model->name}} ">
                    </div>
                    <div class="form-group">
                        <label for="">Quyền</label>
                        <select name="role" class="form-control">
                            <option value="1" {{($model->role==1)? 'selected' :null}}>Admin</option>
                            <option value="0" {{($model->role!=1)? 'selected' :null}}>Customer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value=" {{$model->email}} ">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" value=" {{$model->password}} ">
                    </div>
                    <div>
                    <img src="{{$model->avatar}}" class="rounded mx-auto d-block" width="100">
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