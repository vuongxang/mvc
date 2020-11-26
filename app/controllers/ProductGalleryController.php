<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;

class ProductGalleryController extends BaseController
{
    public function remove(){
        $removeId = $_POST['id'];
        $model=ProductGallery::find($removeId);
            ProductGallery::destroy($removeId);
            $gallerys = ProductGallery::where('product_id',$model->product_id)->get();
            echo json_encode($gallerys);
            die;

    }
    public function index(){
        $product_id = $_GET['product-id'];
        $gallerys = ProductGallery::where('product_id',$product_id)->get();
        $this->render('product-gallery.index',compact('gallerys'));
    }
    public function deleteGallary(){
        $id = isset($_GET['id'])? $_GET['id']: null;
        $product_gallery = ProductGallery::find($id);

        ProductGallery::destroy($id);
        header('location: ./gallery?product-id='.$product_gallery->product_id);
    }
    public function addForm(){
        $product_id = $_GET['product-id'];
        $this->render('product-gallery.add-form',compact('product_id'));
    }
    public function saveAdd(){
        $product_id = $_GET['product-id'];
        $data=$_POST;
        $model = new ProductGallery();
        $model->fill($data);
        $model->product_id = $product_id;
        $imgFile = $_FILES['img_url'];
        $filename = "";

        if ($imgFile['size'] > 0) {
            $filename = uniqid() . '-' . $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], './public/uploads/' . $filename);
            $filename = './public/uploads/' . $filename;
        }
        $model->img_url = $filename;
        $model->save();
        header("location: ./gallery?product-id=$product_id");
    }
    public function saveAddGallery(){
        $product_id = $_POST['id'];
        $imgFile = $_FILES['img_url'];
        $model = new ProductGallery();
        $filename = "";

        if ($imgFile['size'] > 0) {
            $filename = uniqid() . '-' . $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], './public/uploads/' . $filename);
            $filename = './public/uploads/' . $filename;
        }
        $model->img_url = $filename;
        $model->product_id = $product_id;
        $model->save();
        $gallerys = ProductGallery::where('product_id',$model->product_id)->get();
        echo json_encode($gallerys);
        die;
    }
}
