<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;

class ProductController extends BaseController
{
    public function index(){
        if (!isset($_SESSION['user'])) {
            header("location: ./login");
            die;
        }
        $products = Product::all();
        $products->load([
            'galleries',
            'category'
        ]);
        $this->render('products.index', compact('products'));
    }

    public function detail()
    {
        echo "<pre>";
        var_dump(Product::all());
    }
    public function addForm()
    {
        // lấy dữ liệu từ bảng danh mục
        $cates = Category::all();
        $this->render('products.add-form', compact('cates'));
    }
    public function saveAddPro()
    {
        $requestData = $_POST;
        $model = new Product;
        $model->fill($requestData);

        $imgFile = $_FILES['image'];
        $filename = "";

        if ($imgFile['size'] > 0) {
            $filename = uniqid() . '-' . $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], './public/uploads/' . $filename);
            $filename = './public/uploads/' . $filename;
        }
        $model->image = $filename;
        // $model->save();
        // Lưu ảnh galery
        $imgNames = [];
        if (isset($_FILES['img_url'])) {
            $imgGalleries = $_FILES['img_url'];
            $img_names = $imgGalleries['name'];
            foreach ($img_names as $key => $value) {
                $imgNames[$key] = uniqid() . '-' . $value;
                move_uploaded_file($imgGalleries['tmp_name'][$key], './public/uploads/' . $imgNames[$key]);
                $imgNames[$key] = './public/uploads/' . $imgNames[$key];
            }
        }
        $model->save();
        foreach ($imgNames as $value) {
            $imgGallery = new ProductGallery();
            $imgGallery->product_id = $model->id;
            $imgGallery->img_url = $value;
            $imgGallery->save();
        }
        header("location: ./san-pham");
    }

    public function editForm()
    {
        $cates = Category::all();

        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("location: ./san-pham?msg=không đủ thông tin cập nhật");
            die;
        }
        $product = Product::find($id);
        $gallery = ProductGallery::where('product_id', $product->id)->get();

        if (!$product) {
            $msg = "id không tồn tại";
            header("location: ./san-pham?msg=$msg");
        } else {
            $this->render('products.edit-form', compact('cates', 'product', 'gallery'));
        }
    }

    public function saveEdit()
    {
        $requestData = $_POST;
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("location: ./san-pham?msg=không đủ thông tin cập nhật");
            die;
        }
        $model = Product::find($id);
        if (!$model) {
            $msg = "id không tồn tại";
        } else {

            $imgFile = $_FILES['image'];
            $filename = $model->image;

            if ($imgFile['size'] > 0) {
                $filename = uniqid() . '-' . $imgFile['name'];
                move_uploaded_file($imgFile['tmp_name'], './public/uploads/' . $filename);
                $filename = './public/uploads/' . $filename;
            }
            $model->image = $filename;
            $model->fill($requestData);
            $model->save();
            $msg = "Cập nhật thành công";

            //Cập nhập gallery
            // $gallery = ProductGallery::where('product_id',$model->id)->get();
            // $imgNames = $gallery;
            
            // if (isset($_FILES['img_url'])) {
            //     $imgNames = [];
            //     $imgGalleries = $_FILES['img_url'];
            //     $img_names = $imgGalleries['name'];
            //     foreach ($img_names as $key => $value) {
            //         $imgNames[$key] = uniqid() . '-' . $value;
            //         move_uploaded_file($imgGalleries['tmp_name'][$key], './public/uploads/' . $imgNames[$key]);
            //         $imgNames[$key] = './public/uploads/' . $imgNames[$key];
                    
            //     }
            // }

            // // var_dump(!$_FILES['img_url']['size']); die;
            // if(!$_FILES['img_url']['size']){
            //     ProductGallery::where('product_id',$model->id)->delete();
            // }
            
            // foreach ($imgNames as $value) {
            //     $imgGallery = new ProductGallery();
            //     $imgGallery->product_id = $model->id;
            //     $imgGallery->img_url = $value;
            //     $imgGallery->save();
            // }
        }


        header("location: ./san-pham?msg=$msg");
    }

    public function remove()
    {
        $removeId = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$removeId) {
            header("location: ./san-pham?msg=không đủ thông tin để xóa");
            die;
        }
        $model = Product::find($removeId);
        if (!$model) {
            $msg = "id không tồn tại";
        } else {
            Product::destroy($removeId);
            $msg = "Xóa sản phẩm thành công";
        }
        header("location: ./san-pham?msg=$msg");
        die;
    }
    public function searchProduct(){
        $keyword = $_POST['keyword'];
        $products = Product::where('name', 'like', "%$keyword%")->get();
        echo json_encode($products);
        die;
    }
}
