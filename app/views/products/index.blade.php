@extends ('layouts.main')
@section('title','Danh sách sản phẩm')


@section('content')
<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="">Tìm kiếm</label>
            <input type="text" id="keyword" class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <ul id="result"></ul>
</div>
<!--End seach-->
<p class="text-danger">@if(isset($_GET['msg'])) {{ $_GET['msg'] }} @endif</p>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Danh mục</th>
            <th>image</th>
            <th>Gallary</th>
            <th>Price</th>
            <th>
                <a href="./add-product" class="btn btn-success">Add new</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $pro)
        <tr>
            <td>{{$pro->id}}</td>
            <td>{{$pro->name}}</td>
            <td>{{$pro->category->cate_name}}</td>
            <td>
                <img src="{{$pro->image}}" alt="" width="100">
            </td>
            <td>
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#gallery-{{$pro->id}}">
                    {{count($pro->galleries)}} ảnh
                </button>
            </td>
            <td>{{$pro->price}}</td>
            <td>
                <a href="./edit-product?id={{$pro->id}}" class="btn btn-primary">Edit</a>
                <a href="./remove-product?id={{$pro->id}}" class="btn btn-danger" onclick="return confirm('Chắc chắn xóa?')">delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@foreach ($products as $pro)
  <!-- Modal -->
    <div class="modal fade" id="gallery-{{$pro->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gallery của sản phẩm {{$pro->name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="row hien-anh" id="{{$pro->id}}">
            @foreach ($pro->galleries as $img)
                <div class="col-4">
                    <img src="{{$img->img_url}}" class="img-thumbnail">
                    <button onclick="removeGalleryAjax({{$img->id}})" class="xoa-anh btn btn-danger" id="btn-{{$img->id}}">Xóa</button>
                </div>
            @endforeach
            <div class="col-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" name="img_url" class="them-anh">
                    <button class="upload-image">upload</button>
                </form>
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close" data-dismiss="modal" >Close</button>
          <a href={{BASE_URL . 'gallery?product-id=' . $pro->id}} class="btn btn-primary">Chi tiết</a>
        </div>
      </div>
    </div>
  </div>
<input type="hidden" id="add-gallery" value="{{BASE_URL . 'api/add-gallery'}}"/>
<input type="hidden" id="search-product" value="{{BASE_URL . 'api/search-product'}}"/>
<input type="hidden" id="remove-gallery" value="{{BASE_URL . 'api/remove-gallery'}}"/>
@endforeach
@endsection
@section('js')

    <script>
        $('#keyword').keyup(function(){
            let keyword = $(this).val();
            
            $.ajax({
                url: $('#search-product').val(),
                method: "post",
                data: {
                    keyword: keyword
                },
                dataType: 'json',
                success: function(response){
                    $('#result').empty();
                    response.forEach(function(item){
                        $('#result').append(`<li>${item.id} - ${item.name}</li>`)
                    });
                }
            })
        });
        function removeGalleryAjax(imgId){
            // let a = $(this).attr('class');

            $.ajax({
                url: $('#remove-gallery').val(),
                method: "post",
                data: {
                    id: imgId
                },
                dataType: 'json',
                success: function(response){
                    
                    $('.hien-anh').empty();
                    response.forEach(function(item){
                        console.log(item);
                        $('.hien-anh').append(`<div class="col-4">
                            <img src="${item.img_url}" class="img-thumbnail">
                            <button onclick="removeGalleryAjax({{$img->id}})" class="xoa-anh btn btn-danger">Xóa</button>
                        </div>`);
                    });
                }
            })
        }

        $('.close').click(function(){
            location.reload();
        })
       
    </script>
@endsection