@extends('layouts.main')
@section('title', 'Tạo mới danh mục')

@section('content')
        <h3>Tạo mới danh mục</h3>
        <form action="{{BASE_URL.'save-add-category'}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 offet-3">
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="cate_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Show menu</label>
                        <select name="show_menu" class="form-control">
                            <option value="1">Có</option>
                            <option value="0">Không</option>
                        </select>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea name="desc" rows="5" class="form-control"></textarea>
                    </div>
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