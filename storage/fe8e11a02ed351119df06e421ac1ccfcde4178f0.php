
<?php $__env->startSection('title', 'Cập nhật danh mục'); ?>

<?php $__env->startSection('content'); ?>

        <h3 class="text-center">Cập nhật danh mục</h3>
        <form action="./save-edit-cate?id=<?php echo e($model->id); ?>" method="POST" >
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="cate_name" class="form-control" value="<?php echo e($model->cate_name); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Show menu</label>
                        <select name="show_menu" class="form-control">
                            <option value="1" <?php if($model->show_menu == 1): ?> selected <?php endif; ?> >Có</option>
                            <option value="0" <?php if($model->show_menu == 0): ?> selected <?php endif; ?> >Không</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea name="desc" rows="5" class="form-control"><?php echo $model->desc; ?></textarea>
                    </div>
                <div class=" col-12 text-center">
                    <button type="submit" class="btn btn-info">Lưu</button>
                    <a href="./" class="btn btn-danger">Hủy</a>
                </div>
            </div>
            </div>
        </form>
    </div>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\PT15211-PHP2\mvc\app\views/categories/edit-form.blade.php ENDPATH**/ ?>