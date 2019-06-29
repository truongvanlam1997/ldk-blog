<?php
namespace App\Models\Contracts;

use App\Contracts\QueryRepository;

interface TagQueryRepository extends QueryRepository
{
    public function updateTagByName(string $strTag);
    public function filterTagIdOfPost(string $strTag);
}
