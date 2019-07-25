<?php

namespace App\Contracts ;

interface QueryRepository
{
    public function getAll();
     
    public function pagination(array $criterial, array $orderBy, int $limit, int $page);
    
    public function find(int $id);
    
    public function findBy(string $by, $value);
    
    public function insert(array $data);
    
    public function update(int $id, array $data);
    public function delete(int $id);
    public function getAllTrash();
    public function restore($id);
    public function forceDelete($id);
    public function clone($id);
    public function bulk(array $postIds, string $bulkAction);
    public function search($searchTitle, $searchBy);
    public function searchTrash($searchTitle, $searchBy);
    public function sort($sortBy, $oder);
    public function getSlug(string $value);
    public function coverStringToEnglish(string $str);
}
