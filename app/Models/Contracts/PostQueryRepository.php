<?php
namespace App\Models\Contracts;

use App\Contracts\QueryRepository;

interface PostQueryRepository extends QueryRepository
{
    public function getTags();
}
