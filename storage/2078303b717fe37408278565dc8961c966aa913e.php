

<?php $__env->startSection('title','Đăng nhập'); ?>;
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-6 offset-3">
            <p class="text-danger"><?php echo e(isset($_GET['msg']) ?  $_GET['msg']: null); ?></p>
            <form action="./check-login" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" id="">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" id="">
                </div>
                <button type="submit" class="btn btn-danger offset-5">Đăng nhập</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\PT15211-PHP2\mvc\app\views/users/login-form.blade.php ENDPATH**/ ?>