<?php
namespace App\Models\Contracts;

use App\Contracts\QueryRepository;

interface CategoryPostQueryRepository extends QueryRepository
{
    public function insertCategoryPostTable($postId, array $categoryIds);
}
