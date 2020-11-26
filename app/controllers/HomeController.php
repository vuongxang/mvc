<?php
namespace App\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class HomeController extends BaseController{

public function index(){
    User::checkSession();
    $cates = Category::count();
    $products = Product::count();
    $users = User::count();
    $this->render('home.index', compact('cates', 'products', 'users'));
}
    public function search(){
        $keyword = "Vaughn";

        $products = Product::where('name','like',"%$keyword%")->
                            orwhere('detail','like',"%$keyword%")->get();
        echo "<pre>";
        var_dump($products);
        $product_3000 = Product::where('price',74859)->get();
        echo "<pre>";
        var_dump($product_3000);
    }
}

?>