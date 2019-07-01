<?php
namespace App\Models\Contracts;

use App\Contracts\QueryRepository;

interface PostTagQueryRepository extends QueryRepository
{
    public function insertPostTagTable($postId, array $tagIds);
}
