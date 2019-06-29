<?php

namespace App\Models\Repositories;

use App\Models\Entities\Tag;
use App\Repositories\EloquentRepository;
use App\Models\Contracts\TagQueryRepository;

class TagRepository extends EloquentRepository implements TagQueryRepository
{
    public function __construct()
    {
        $this->setModel();
    }
    
    public function getModel()
    {
        return Tag::class;
    }
    public function updateTagByName(string $strTag)
    {
        $arrayTag = explode(",", $strTag) ;
       
        foreach ($arrayTag as $index => $tag) {
            $tag = trim($tag);
            if ($this->model->where('name', $tag)->count() == 0) {
                $this->model->insert(['name' => $tag]);
            }
        }
    }
    public function filterTagIdOfPost(string $strTag)
    {  // cách 2 :
        
        $arrayTag = explode(",", $strTag) ;
        $arrayTagId = [];
        foreach ($arrayTag as $index => $tag) {
            $tag = trim($tag);
            if ($this->model->where('name', $tag)->count() > 0) {
                $arrayTagId[$index] = $this->model->where('name', $tag)->first()->id;
            }
        }
        return $arrayTagId ;
    }
}
