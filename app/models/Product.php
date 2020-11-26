<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $table  = "products";
    protected $fillable = ['name','cate_id','short_desc','price','detail','star','views'];
    public function category(){
        return $this->belongsTo(Category::class, 'cate_id');
    }

    public function galleries(){
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}

?>