<?php
namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\PostTraits\Mutator;
use App\Models\Traits\PostTraits\Relationship;
use App\Models\Traits\PostTraits\Property;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Mutator,Relationship,Property,SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'description',
        'thumbnail',
        'author_id',
        'slug',
        'view',
        'status',
        'published_at'
    
    ];
}
