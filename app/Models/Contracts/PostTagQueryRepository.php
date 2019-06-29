<?php
namespace App\Models\Contracts;

use App\Contracts\QueryRepository;

interface PostTagQueryRepository extends QueryRepository
{
    public function updatePostTagTable($postId, array $tagIds);
}
