<?php
namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\PostTraits\Mutator;
use App\Models\Traits\PostTraits\Relationship;
use App\Models\Traits\PostTraits\Property;

class Post extends Model
{
    use Mutator,Relationship,Property;

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
