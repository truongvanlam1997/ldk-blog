<?php
namespace App\Models\Contracts;

use App\Contracts\QueryRepository;

interface AuthorQueryRepository extends QueryRepository
{
    public function getArrayAuthors();
}
