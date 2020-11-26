@extends ('layouts.main')
@section('title','Danh sách sản phẩm')


@section('content')
<h3>Tạo mới sản phẩm</h3>
<form action="{{BASE_URL . 'save-add-product'}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cate_id" class="form-control">
                            @foreach ($cates as $ca)
                            <option value="{{$ca->id}}">{{$ca->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá sản phẩm</label>
                        <input type="number" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="short_desc" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Ảnh chi tiết</label>
                        <input type="file" name="img_url[]" class="form-control" multiple="multiple">
                    </div>
                        {{-- Ảnh chi tiết --}}
                    <div class="form-group">
                        <label for="">Đánh giá</label>
                        <input type="number" step="0.1" name="star" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Lượt xem</label>
                        <input type="number" name="views" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Chi tiết</label>
                        <textarea name="detail" class="form-control" rows="6" id="editor1"></textarea>
                    </div>
                </div>
                <div class=" col-12 text-center">
                    <button type="submit" class="btn btn-info">Lưu</button>
                    <a href="./" class="btn btn-danger">Hủy</a>
                </div>
            </div>
        </form>
    </div>
    @endsection
    @section('js')
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
    @endsection