<?php

namespace App\Models\Traits\CategoryTraits;

use App\Models\Entities\Category;
use App\Models\Entities\Post;

trait Relationship
{
    public function parentCategory()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }
    public function posts()
    {
        return $this->belongsHasMany(Post::class, 'Category_posts', 'category_id', 'post_id');
    }
}
