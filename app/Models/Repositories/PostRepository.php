<?php

namespace App\Models\Repositories;

use App\Models\Entities\Post;
use App\Repositories\EloquentRepository;
use App\Models\Contracts\PostQueryRepository;

class PostRepository extends EloquentRepository implements PostQueryRepository
{
    public function __construct()
    {
        $this->setModel();
    }
    
    public function getModel()
    {
        return Post::class;
    }
    public function getTags()
    {
        $this->model->getTags();
    }
}
