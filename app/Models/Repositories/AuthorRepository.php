<?php

namespace App\Models\Repositories;

use App\Models\Entities\Author;
use App\Repositories\EloquentRepository;
use App\Models\Contracts\AuthorQueryRepository;

class AuthorRepository extends EloquentRepository implements AuthorQueryRepository
{
    public function __construct()
    {
        $this->setModel();
    }
    
    public function getModel()
    {
        return Author::class;
    }
    public function getArrayAuthors()
    {
        return $this->model->all()->pluck('name', 'id')->all();
    }
}
