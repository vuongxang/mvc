<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo e(BASE_URL); ?>">Trang chủ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(BASE_URL); ?>">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(BASE_URL.'danh-muc'); ?>">Danh mục</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(BASE_URL.'san-pham'); ?>" tabindex="-1" aria-disabled="true">Sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(BASE_URL.'tai-khoan'); ?>" tabindex="-1" aria-disabled="true">Tài khoản</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(BASE_URL.'dang-xuat'); ?>" tabindex="-1" aria-disabled="true">Đăng xuất</a>
            </li>
        </ul>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\PHP2\PT15211-PHP2\mvc\app\views/layouts/nav.blade.php ENDPATH**/ ?>