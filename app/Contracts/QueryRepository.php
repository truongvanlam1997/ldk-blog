<?php

namespace App\Contracts ;

interface QueryRepository
{
    public function getAll();
     
    public function pagination(array $criterial, int $limit, int $page);
    
    public function find(int $id);
    
    public function findBy(string $by, $value);
    
    public function insert(array $data);
    
    public function update(int $id, array $data);
    
    public function delete(int $id);
    public function getSlug(string $value);
    public function coverStringToEnglish(string $str);
}
