
<?php $__env->startSection('title','Danh sách sản phẩm'); ?>


<?php $__env->startSection('content'); ?>
<h3>Tạo mới sản phẩm</h3>
<form action="<?php echo e(BASE_URL . 'save-add-gallery?product-id='.$product_id); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <input type="file" name="img_url" id="">
                <div class=" col-12 text-center">
                    <button type="submit" class="btn btn-info">Lưu</button>
                <a href="./gallery?product-id=<?php echo e($product_id); ?>" class="btn btn-danger">Hủy</a>
                </div>
            </div>
        </form>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\PT15211-PHP2\mvc\app\views/product-gallery/add-form.blade.php ENDPATH**/ ?>