<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Thêm danh mục</title>
</head>

<body>
    <div class="container">
        <h3>Thêm danh mục</h3>
        <form action="./save-add-category" method="post">
            <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" name="cate_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Show_menu</label>
                <select name="show_menu" class="form-control">
                    <option value="1">Có</option>
                    <option value="0">Không</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="./" class="btn btn-danger">Hủy</a>
        </form>
    </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\PHP2\PT15211-PHP2\mvc\app\views/category/add-form.blade.php ENDPATH**/ ?>