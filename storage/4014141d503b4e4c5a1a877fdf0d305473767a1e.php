
<?php $__env->startSection('title','Thêm sản phẩm'); ?>
<?php $__env->startSection('content'); ?>
<h3 class="text-center">Tạo mới sản phẩm</h3>
<form action="<?php echo e(BASE_URL . 'save-add-user'); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Quyền</label>
                        <select name="role" class="form-control">
                            <option value="1">Admin</option>
                            <option value="0">Customer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Ảnh đại diện</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                </div>
                
                    
                <div class=" col-12 text-center">
                    <button type="submit" class="btn btn-info">Lưu</button>
                    <a href="<?php echo e(BASE_URL); ?>" class="btn btn-danger">Hủy</a>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\PT15211-PHP2\mvc\app\views/users/add-form.blade.php ENDPATH**/ ?>