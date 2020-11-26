<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = "users";
    protected $fillable = ['name','avatar','email','role','password'];
    static function checkSession(){
        if (!isset($_SESSION['user'])) {
                header("location: ./login");
                die;
            }
        }
}

?>