@extends('layouts.main')
@section('title', 'Cập nhật danh mục')

@section('content')

        <h3 class="text-center">Cập nhật danh mục</h3>
        <form action="./save-edit-cate?id={{$model->id}}" method="POST" >
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="cate_name" class="form-control" value="{{$model->cate_name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Show menu</label>
                        <select name="show_menu" class="form-control">
                            <option value="1" @if($model->show_menu == 1) selected @endif >Có</option>
                            <option value="0" @if($model->show_menu == 0) selected @endif >Không</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea name="desc" rows="5" class="form-control">{!! $model->desc !!}</textarea>
                    </div>
                <div class=" col-12 text-center">
                    <button type="submit" class="btn btn-info">Lưu</button>
                    <a href="./" class="btn btn-danger">Hủy</a>
                </div>
            </div>
            </div>
        </form>
    </div>


    @endsection