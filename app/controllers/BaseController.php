<?php
namespace App\Controllers;

use App\Models\User;
use Jenssegers\Blade\Blade;

class BaseController {
    // function __construct()
    // {
    //     if (!isset($_SESSION['user'])) {
    //         header("location: ./login");
    //         die;
    //     }
    // }
    protected function render($view,$data = []){
        $blade = new Blade('./app/views', 'storage');
        echo $blade->make($view, $data)->render();
    }
}

?>