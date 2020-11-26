@extends('layouts.main')

@section('title','Đăng nhập');
@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <p class="text-danger">{{ isset($_GET['msg']) ?  $_GET['msg']: null }}</p>
            <form action="./check-login" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" id="">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" id="">
                </div>
                <button type="submit" class="btn btn-danger offset-5">Đăng nhập</button>
            </form>
        </div>
    </div>
@endsection