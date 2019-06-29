<?php

namespace App\Models\Traits\CategoryTraits;

use App\Models\Entities\Category;

trait Relationship
{
    public function parentCategory()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }
}
