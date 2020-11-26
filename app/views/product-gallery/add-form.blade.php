@extends ('layouts.main')
@section('title','Danh sách sản phẩm')


@section('content')
<h3>Tạo mới sản phẩm</h3>
<form action="{{BASE_URL . 'save-add-gallery?product-id='.$product_id}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <input type="file" name="img_url" id="">
                <div class=" col-12 text-center">
                    <button type="submit" class="btn btn-info">Lưu</button>
                <a href="./gallery?product-id={{$product_id}}" class="btn btn-danger">Hủy</a>
                </div>
            </div>
        </form>
    </div>
    @endsection