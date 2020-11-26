
<?php $__env->startSection('title','Danh sách sản phẩm'); ?>


<?php $__env->startSection('content'); ?>
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
<p class="text-danger"><?php if(isset($_GET['msg'])): ?> <?php echo e($_GET['msg']); ?> <?php endif; ?></p>
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
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($pro->id); ?></td>
            <td><?php echo e($pro->name); ?></td>
            <td><?php echo e($pro->category->cate_name); ?></td>
            <td>
                <img src="<?php echo e($pro->image); ?>" alt="" width="100">
            </td>
            <td>
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#gallery-<?php echo e($pro->id); ?>">
                    <?php echo e(count($pro->galleries)); ?> ảnh
                </button>
            </td>
            <td><?php echo e($pro->price); ?></td>
            <td>
                <a href="./edit-product?id=<?php echo e($pro->id); ?>" class="btn btn-primary">Edit</a>
                <a href="./remove-product?id=<?php echo e($pro->id); ?>" class="btn btn-danger" onclick="return confirm('Chắc chắn xóa?')">delete</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <!-- Modal -->
    <div class="modal fade" id="gallery-<?php echo e($pro->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gallery của sản phẩm <?php echo e($pro->name); ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="row hien-anh" id="<?php echo e($pro->id); ?>">
            <?php $__currentLoopData = $pro->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-4">
                    <img src="<?php echo e($img->img_url); ?>" class="img-thumbnail">
                    <button onclick="removeGalleryAjax(<?php echo e($img->id); ?>)" class="xoa-anh btn btn-danger" id="btn-<?php echo e($img->id); ?>">Xóa</button>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
          <a href=<?php echo e(BASE_URL . 'gallery?product-id=' . $pro->id); ?> class="btn btn-primary">Chi tiết</a>
        </div>
      </div>
    </div>
  </div>
<input type="hidden" id="add-gallery" value="<?php echo e(BASE_URL . 'api/add-gallery'); ?>"/>
<input type="hidden" id="search-product" value="<?php echo e(BASE_URL . 'api/search-product'); ?>"/>
<input type="hidden" id="remove-gallery" value="<?php echo e(BASE_URL . 'api/remove-gallery'); ?>"/>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

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
                            <button onclick="removeGalleryAjax(<?php echo e($img->id); ?>)" class="xoa-anh btn btn-danger">Xóa</button>
                        </div>`);
                    });
                }
            })
        }

        $('.close').click(function(){
            location.reload();
        })
       
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\PT15211-PHP2\mvc\app\views/products/index.blade.php ENDPATH**/ ?>