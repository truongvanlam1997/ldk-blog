<?php

namespace App\Models\Repositories;

use App\Models\Entities\CategoryPost;
use App\Repositories\EloquentRepository;
use App\Models\Contracts\CategoryPostQueryRepository;

class CategoryPostRepository extends EloquentRepository implements CategoryPostQueryRepository
{
    public function __construct()
    {
        $this->setModel();
    }
    
    public function getModel()
    {
        return CategoryPost::class;
    }
    public function insertCategoryPostTable($postId, array $categoryIds)
    {
        foreach ($categoryIds as $categoryId) {
            $this->model->insert(['post_id' => $postId ,
                                'category_id' => $categoryId

            ]);
        }
    }
}
