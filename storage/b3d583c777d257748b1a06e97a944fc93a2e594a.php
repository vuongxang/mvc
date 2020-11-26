

<?php $__env->startSection('title','Quản lý tài khoản'); ?>;
<?php $__env->startSection('content'); ?>
<p class="text-danger"><?php echo e(isset($_GET['msg']) ?  $_GET['msg']: null); ?></p>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>avatar</th>
            <th>email</th>
            <th>role</th>
            <th>
            <a class="btn btn-success" href="<?php echo e(BASE_URL.'add-user'); ?>">Add new</a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td> <?php echo e($item->id); ?> </td>
                <td> <?php echo e($item->name); ?> </td>
                <td> <img src="<?php echo e(BASE_URL); ?><?php echo e($item->avatar); ?>" alt="" width="100"> </td>
                <td> <?php echo e($item->email); ?> </td>
                <td> <?php if($item->role==1): ?>
                    admin
                    <?php else: ?>
                    Customor
                    <?php endif; ?>
                     </td>
                <td>
                <a class="btn btn-primary" href="<?php echo e(BASE_URL.'edit-user'); ?>?id=<?php echo e($item->id); ?>">Edit</a>
                <a class="btn btn-danger" href="<?php echo e(BASE_URL.'remove-user'); ?>?id=<?php echo e($item->id); ?>">delete</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\PT15211-PHP2\mvc\app\views/users/index.blade.php ENDPATH**/ ?>