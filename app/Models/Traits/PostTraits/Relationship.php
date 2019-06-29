<?php

namespace App\Models\Traits\PostTraits;

use App\Models\Entities\Author;
use App\Models\Entities\PostTag;
use App\Models\Entities\Tag;

trait Relationship
{
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function postTags()
    {
        return $this->belongsTo(PostTag::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
