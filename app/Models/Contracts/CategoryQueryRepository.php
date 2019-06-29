<?php
namespace App\Models\Contracts;

use App\Contracts\QueryRepository;

interface CategoryQueryRepository extends QueryRepository
{
    public function getListParentNames();
}
