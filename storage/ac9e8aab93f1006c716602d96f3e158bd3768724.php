
<?php $__env->startSection('title', 'Danh sách danh mục'); ?>

<?php $__env->startSection('content'); ?>

<h3>Danh sách danh mục</h3>
<p class="text-danger"><?php if(isset($_GET['msg'])): ?> <?php echo e($_GET['msg']); ?> <?php endif; ?></p>
<table class="table table-hover">
    <thead>
        <th>ID</th>
        <th>Cate Name</th>
        <th>Total Product</th>
        <th>Show menu</th>
        <th>
            <a class="btn btn-sm btn-success" href="add-cate">Tạo mới</a>
        </th>
    </thead>
    <tbody>

        <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->id); ?></td>
                <td><?php echo e($item->cate_name); ?></td>
                <td><?php echo e(count($item->products)); ?></td>
                <td><?php echo e($item->show_menu == 1 ? "Yes" : "No"); ?></td>
                <td>
                    <a class="btn btn-sm btn-info" href="<?php echo e(BASE_URL . 'edit-cate?id=' . $item->id); ?>">Edit</a>
                    <a class="btn btn-sm btn-danger" href="<?php echo e(BASE_URL . 'remove-cate?id=' . $item->id); ?>">Remove</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\PT15211-PHP2\mvc\app\views/categories/index.blade.php ENDPATH**/ ?>