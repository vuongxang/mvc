@extends ('layouts.main')
@section('title','Danh sách sản phẩm')


@section('content')
<h3>Cập nhật sản phẩm</h3>
        <form action="./save-edit-product?id={{$product->id}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cate_id" class="form-control">
                            @foreach ($cates as $ca)
                            <option value="{{$ca->id}}" @if($ca->id==$product->cate_id) selected @endif >{{$ca->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá sản phẩm</label>
                        <input type="number" name="price" class="form-control" value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="short_desc" class="form-control" rows="4">{{$product->short_desc}}</textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-4 offset-4">
                            <img src="{{$product->image}}" class="img-fluid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-4 offset-4">
                        @foreach ($gallery as $item)
                        <img src="{{$item->img_url}}" class="img-fluid">
                        @endforeach
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Ảnh chi tiết</label>
                        <input type="file" name="img_url[]" class="form-control" multiple="multiple">
                    </div> --}}
                    {{-- Ảnh thư viện --}}
                    <div class="form-group">
                        <label for="">Đánh giá</label>
                        <input type="number" step="0.1" name="star" class="form-control" value="{{$product->star}}">
                    </div>
                    <div class="form-group">
                        <label for="">Lượt xem</label>
                        <input type="number" name="views" class="form-control" value="{{$product->views}}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Chi tiết</label>
                        <textarea name="detail" class="form-control" rows="6" id="editor1">{{$product->detail}}</textarea>
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
