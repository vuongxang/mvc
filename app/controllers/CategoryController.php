<?php
namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
class CategoryController extends BaseController{
    public function index(){
        User::checkSession();
        $cates = Category::all();
        $this->render('categories.index', compact('cates'));
    }
    public function remove(){
        // kiểm tra xem có danh mục với id trên đường dẫn hay không
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($id==-1){
            header('location: ' . BASE_URL . 'danh-muc?msg=Không đủ dữ liệu xóa');
            die;
        }
        $model = Category::find($id);
        // nếu có thì thực hiện xóa toàn bộ sản phẩm thuộc về danh mục đó đi
        if($model){
            Product::where('cate_id', $id)->delete();
            // thực hiện xóa danh mục
            $model->delete();
            $msg="Xóa thành công";
        }else{
            $msg="ID không tồn tại";
        }

        header('location: ' . BASE_URL . 'danh-muc?msg='.$msg);
        
    }

    public function addForm(){
        $this->render('categories.add-form');
    }

    public function saveAddCate(){
        
        $requestData = $_POST;
        $model = new Category;
        $model->fill($requestData);
        $model->save();
        header('location: ' . BASE_URL . 'danh-muc');
        
    }
    public function editFormCate(){

        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("location: ./danh-muc?msg=không đủ thông tin cập nhật");
            die;
        }
        $model = Category::find($id);
        if (!$model) {
            $msg = "id không tồn tại";
            header("location: ./danh-muc?msg=$msg");
        } else {
            $this->render('categories.edit-form',compact('model'));
        }
    }
    public function saveEditCate(){
        $requestData = $_POST;
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header('location: ' . BASE_URL . 'danh-muc?msg=Không đủ dữ liệu cập nhật');
            die;
        }
        $model = Category::find($id);
        if (!$model) {
            $msg = "id không tồn tại";
        } else {
            $model->fill($requestData);
            $model->save();
            $msg="Cập nhật thành công";
        }
        header('location: ' . BASE_URL . 'danh-muc?msg='.$msg);
    }
}

?>