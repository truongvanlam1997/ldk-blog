<?php

namespace App\Models\Repositories;

use App\Models\Entities\PostTag;
use App\Repositories\EloquentRepository;
use App\Models\Contracts\PostTagQueryRepository;

class PostTagRepository extends EloquentRepository implements PostTagQueryRepository
{
    public function __construct()
    {
        $this->setModel();
    }
    
    public function getModel()
    {
        return PostTag::class;
    }
    public function updatePostTagTable($postId, array $tagIds)
    {
        foreach ($tagIds as $tagId) {
            $this->model->insert(['post_id' => $postId,
                                    'tag_id' => $tagId
            ]);
        }
    }
}
