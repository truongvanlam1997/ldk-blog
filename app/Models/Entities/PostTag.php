<?php


namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\Entities\Post;
use App\Models\Entities\Tag;

class PostTag extends Model
{
    protected $table = 'post_tags';
    

    protected $fillable = [
        'post_id',
        'tag_id',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
