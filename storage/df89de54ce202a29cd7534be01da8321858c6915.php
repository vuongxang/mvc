
<?php $__env->startSection('title','Danh sách sản phẩm'); ?>


<?php $__env->startSection('content'); ?>

<p class="text-danger"><?php if(isset($_GET['msg'])): ?> <?php echo e($_GET['msg']); ?> <?php endif; ?></p>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Sản phẩm</th>
            <th>
            <a href="./add-gallery?product-id=<?php echo e($_GET['product-id']); ?>" class="btn btn-success">Add new</a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $gallerys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($item->id); ?></td>
            <td><img src="<?php echo e($item->img_url); ?>" alt="" width="70"></td>
            <td><?php echo e($item->product_id); ?></td>
            <td>
                <a href="">Sửa</a>
                <a href="./delete-gallery?id=<?php echo e($item->id); ?>">Xóa</a>
            </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\PT15211-PHP2\mvc\app\views/product-gallery/index.blade.php ENDPATH**/ ?>