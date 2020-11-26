<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model {
    protected $table = "product_galleries";
    protected $fillable = ['id','product_id','img_url'];
}

?>