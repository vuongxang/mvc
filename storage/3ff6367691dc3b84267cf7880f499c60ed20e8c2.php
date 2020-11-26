<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Danh sách sản phẩm</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>ảnh</th>
                <th>Price</th>
                <th>
                    <a href="./add-product">Add new</a>
                </th>
        </thead>
        <tbody>
            <tr>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td><?php echo e($item->id); ?></td>
                <td><?php echo e($item->name); ?></td>
                <td>
                    <img src="<?php echo e($item->image); ?>" alt="" width="100">
                </td>
                <td><?php echo e($item->price); ?></td>
                <td>
                    <a href="./edit-product?id=<?php echo e($item->id); ?>">Edit</a>
                    <a href="./remove-product?id=<?php echo e($item->id); ?>">Remove</a>
                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
        </tbody>
    </table>
</body>
</html><?php /**PATH C:\xampp\htdocs\PHP2\PT15211-PHP2\mvc\app\views/product/product.blade.php ENDPATH**/ ?>