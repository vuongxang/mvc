<?php

namespace App\Controllers;


use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        User::checkSession();
        $users = User::all();
        $this->render('users.index', compact('users'));
    }
    public function loginForm()
    {
        $this->render('users.login-form');
    }
    public function checkLogin()
    {
        $data = $_POST;
        $model = User::where('name', $data['name'])->first();

        if (!$model) {
            header('location: ' . BASE_URL . 'login?msg=Sai tên đăng nhập');
            die;
        }
        if (!password_verify($data['password'],$model->password)) {
            header('location: ' . BASE_URL . 'login?msg=Sai mật khẩu');
            die;
        }
        $_SESSION['user']['name'] = $model->name;
        $_SESSION['user']['password'] = $model->password;
        header('location: ./?msg=Đăng nhập thành công');
        die;
    }
    public function logout(){
        session_destroy();
        header("location: ./");
        die;
    }
    public function addForm()
    {
        $this->render('users.add-form');
    }
    public function saveAdd()
    {
        $data = $_POST;
        $model = new User();
        $model->fill($data);
        $imgFile = $_FILES['avatar'];
        $filename = "";

        if ($imgFile['size'] > 0) {
            $filename = uniqid() . '-' . $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], './public/uploads/' . $filename);
            $filename = './public/uploads/' . $filename;
        }
        $model->avatar = $filename;
        $model->password = password_hash($model->password, PASSWORD_DEFAULT);
        $model->save();
        header('location: ' . BASE_URL . 'tai-khoan');
    }

    public function remove()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header('location: ' . BASE_URL . 'tai-khoan?msg=Không đủ dữ liệu để xóa');
            die;
        }
        $model = User::find($id);
        if (!$model) {
            $msg = "Bản ghi không tồn tại";
        } else {
            $model->delete();
            $msg = "Xóa thành công";
        }
        header('location: ' . BASE_URL . 'tai-khoan?msg=' . $msg);
    }
    public function editForm()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header('location: ' . BASE_URL . 'tai-khoan?msg=Không đủ dữ liệu để cập nhật');
            die;
        }
        $model = User::find($id);
        if (!$model) {
            header('location: ' . BASE_URL . 'tai-khoan?msg=Bản ghi không tồn tại');
            die;
        } else {
            $this->render('users.edit-form', compact('model'));
        }
    }

    public function saveEdit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header('location: ' . BASE_URL . 'tai-khoan?msg=Không đủ dữ liệu để cập nhật');
            die;
        }
        $model = User::find($id);
        if (!$model) {
            $msg = "Bản ghi không tồn tại";
        } else {
            $data = $_POST;
            $model->fill($data);
            $model->password = password_hash($model->password, PASSWORD_DEFAULT);
            $imgFile = $_FILES['avatar'];
            $filename = $model->avatar;

            if ($imgFile['size'] > 0) {
                $filename = uniqid() . '-' . $imgFile['name'];
                move_uploaded_file($imgFile['tmp_name'], './public/uploads/' . $filename);
                $filename = './public/uploads/' . $filename;
            }
            $model->avatar = $filename;
            $model->save();
            $msg = "Cập nhật thành công";
        }
        header('location: ' . BASE_URL . 'tai-khoan?msg=' . $msg);
    }
}
