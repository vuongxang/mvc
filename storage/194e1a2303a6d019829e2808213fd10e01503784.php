
<?php $__env->startSection('title', 'Danh sách danh mục'); ?>

<?php $__env->startSection('content'); ?>
        <h3>Tạo mới sản phẩm</h3>
        <form action="<?php echo e(BASE_URL.'save-add-category'); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 offet-3">
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="cate_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Show menu</label>
                        <select name="show_menu" class="form-control">
                            <option value="1">Có</option>
                            <option value="0">Không</option>
                        </select>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea name="desc" rows="5" class="form-control"></textarea>
                    </div>
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\PT15211-PHP2\mvc\app\views/categories/add-form.blade.php ENDPATH**/ ?>