<?php


namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\CategoryTraits\Property;
use App\Models\Traits\CategoryTraits\Relationship;

class Category extends Model
{
    use Relationship,Property;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'icon',
        'slug',
        'status',
        'parent_id'
        
    ];
}
