<?php

namespace App\Models\Traits\TagTraits;

use App\Models\Entities\PostTag;
use App\Models\Entities\Post;

trait Relationship
{
    public function postTags()
    {
        return $this->belongsTo(PostTag::class);
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
    }
}
