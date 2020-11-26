<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Category extends Model{
    protected $table = 'categories';
    protected $fillable = ['cate_name','show_menu','slug','desc'];
    public function products()
    {
        return $this->hasMany(Product::class, 'cate_id');
    }
    
}

?>