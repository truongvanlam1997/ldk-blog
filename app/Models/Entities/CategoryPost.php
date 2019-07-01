<?php


namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\Entities\Post;
use App\Models\Entities\Category;

class CategoryPost extends Model
{
    protected $table = 'category_posts';

    protected $fillable = [
       'category_id',
       'post_id'
    
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
