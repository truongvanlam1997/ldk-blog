<?php


namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\TagTraits\Relationship;
use App\Models\Traits\TagTraits\Property;

class Tag extends Model
{
    use Relationship, Property;
    protected $table = 'tags';

    protected $fillable = [ 'name' ];
}
