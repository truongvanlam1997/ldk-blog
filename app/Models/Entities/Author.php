<?php


namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\AuthorTraits\Relationship;
use App\Models\Traits\AuthorTraits\Property;

class Author extends Model
{
    use Relationship,Property;

    protected $table = 'authors';

    protected $fillable = [
        'name',
        'description',
        'address',
        'numberphone',
        'status'
        
    ];
}
