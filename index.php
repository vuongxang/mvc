<?php
session_start();
require_once './config/helpers.php';
require_once './vendor/autoload.php';
require_once './config/db.php';

use App\Controllers\CategoryController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\UserController;
use App\Controllers\ProductGalleryController;
use App\Models\User;

$url = isset($_GET['url']) ? $_GET['url']: "/" ;
switch ($url) {
    case '/':
        # gọi đến hàm index của HomeController
        $ctr = new HomeController();
        $ctr->index();
        break;
    case 'login':
        $ctr = new UserController();
        $ctr->loginForm();
        break;
    case 'check-login':
        $ctr = new UserController();
        $ctr->checkLogin();
        break;
    case 'dang-xuat':
        $ctr = new UserController();
        $ctr->logout();
        break;
    case 'danh-muc':
        $ctr = new CategoryController();
        $ctr->index();
        break;
    case 'add-cate':
        $ctr = new CategoryController();
        $ctr->addForm();
        break;
    case 'save-add-category':
        $ctr = new CategoryController();
        $ctr->saveAddCate();
        break;
        
    case 'edit-cate':
        $ctr = new CategoryController();
        $ctr->editFormCate();
        break;
    case 'save-edit-cate':
        $ctr = new CategoryController();
        $ctr->saveEditCate();
        break;
        
    case 'remove-cate':
        $ctr = new CategoryController();
        $ctr->remove();
    case 'san-pham':
        # gọi đến hàm index của ProductController => Danh sách sản phẩm
        # view products/index.blade.php
        # hiển thị danh sách sản phẩm
        $ctr = new ProductController();
        $ctr->index();
        break;
    case 'add-product':
        $ctr = new ProductController();
        $ctr->addForm();
        break;
    case 'save-add-product':
        $ctr = new ProductController();
        $ctr->saveAddPro();
        break;  
    case 'edit-product':
        $ctr = new ProductController();
        $ctr->editForm();
        break;
    case 'save-edit-product':
        $ctr = new ProductController();
        $ctr->saveEdit();
        break;
           
    case 'remove-product':
        $ctr = new ProductController();
        $ctr->remove();
        break;
    case 'chi-tiet':
        # gọi đến hàm detail của ProductController
        $ctr = new ProductController();
        $ctr->detail();
        break;
    case 'tai-khoan':
        # gọi đến hàm detail của ProductController
        $ctr = new UserController();
        $ctr->index();
        break;
    case 'add-user':
        $ctr = new UserController();
        $ctr->addForm();
        break;
    case 'save-add-user':
        $ctr = new UserController();
        $ctr->saveAdd();
        break;
    case 'remove-user':
        $ctr = new UserController();
        $ctr->remove();
        break;
    case 'edit-user':
        $ctr = new UserController();
        $ctr->editForm();
        break;
    case 'save-edit-user':
        $ctr = new UserController();
        $ctr->saveEdit();
        break;
    case 'api/search-product':
        $ctr = new ProductController();
        $ctr->searchProduct();
        break;
    case 'api/remove-gallery':
        $ctr = new ProductGalleryController();
        $ctr->remove();
        break;
    case 'api/add-gallery':
        $ctr = new ProductGalleryController();
        $ctr->addForm();
        break;
    case 'gallery':
        $ctr = new ProductGalleryController();
        $ctr->index();
        break;
    case 'delete-gallery':
        $ctr = new ProductGalleryController();
        $ctr->deleteGallary();
        break;
    case 'add-gallery':
        $ctr = new ProductGalleryController();
        $ctr->addForm();
        break;
    case 'save-add-gallery':
        $ctr = new ProductGalleryController();
        $ctr->saveAdd();
        break;
        
    default:
        # code...
        break;
}

?>