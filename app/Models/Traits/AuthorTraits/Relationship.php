<?php

namespace App\Models\Traits\AuthorTraits;

use App\Models\Entities\Post;

trait Relationship
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
