
<?php $__env->startSection('title', 'PT15211-web - Trang chủ'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo e(BASE_URL . 'public/uploads/users.jpg'); ?>" class="home-card-img card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Hiện có <?php echo e($users); ?> tài khoản</h5>
                    <a href="<?php echo e(BASE_URL . 'tai-khoan'); ?>" class="btn btn-primary">Chi tiết</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo e(BASE_URL . 'public/uploads/categories.png'); ?>" class="home-card-img card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Hiện có <?php echo e($cates); ?> danh mục</h5>
                    <a href="<?php echo e(BASE_URL . 'danh-muc'); ?>" class="btn btn-primary">Chi tiết</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo e(BASE_URL . 'public/uploads/products.png'); ?>" class="home-card-img card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Hiện có <?php echo e($products); ?> sản phẩm</h5>
                    <a href="<?php echo e(BASE_URL . 'sản phẩm'); ?>" class="btn btn-primary">Chi tiết</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\PT15211-PHP2\mvc\app\views/home/index.blade.php ENDPATH**/ ?>