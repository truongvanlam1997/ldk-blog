<?php

namespace App\Repositories;

use App\Contracts\QueryRepository;

abstract class EloquentRepository implements QueryRepository
{
    protected $model;
    abstract public function getModel();

    public function setmodel()
    {
        // $modelName = $this->getModel();
        // $this->model = new $modelName();
        
        $this->model = app()->make($this->getModel());
    }

    public function pagination(array $criterial, int $limit = 15, int $page = 1)
    {
        return $this->model->where($criterial)->paginate($limit);
    }
    
    public function getAll()
    {
        return $this->model->all();
    }
    public function find(int $id)
    {
        $model= $this->model->find($id);
        return $model;
    }
    
    public function findBy(string $by, $value)
    {
        return $this->model->where($by, $value)->get();
    }
    
    public function insert(array $data)
    {
        $this->model->fill($data);
        $this->model->save();
        $id = $this->model->id;
        return $id;
    }
    
    public function update(int $id, array $data)
    {
        // $this->model->where('id', $id)->update($data);
        $model = $this->model->find($id);
        $model->fill($data);
        $model->save();
    }
    
    public function delete(int $id)
    {
        $model= $this->model->find($id);
        $model->delete();
    }
    public function getSlug(string $value)
    {
        $string = $this->coverStringToEnglish($value);
        $slug   = str_replace(" ", "-", $string);

        return $slug;
    }
    public function coverStringToEnglish(string $str)
    {
        $str = strtolower($str);
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);

        return $str;
    }
}
