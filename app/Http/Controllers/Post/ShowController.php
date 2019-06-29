<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\PostQueryRepository;
use App\Models\Contracts\AuthorQueryRepository;

class ShowController extends Controller
{
    protected $postQueryRepository;
    protected $authorQueryRepository;
    public function __construct(PostQueryRepository $postQueryRepository, AuthorQueryRepository $authorQueryRepository)
    {
        $this->postQueryRepository = $postQueryRepository;
        $this->authorQueryRepository = $authorQueryRepository;
    }
    public function __invoke($id)
    {
        $post =  $this->postQueryRepository->find($id);
        $author = $this->authorQueryRepository->find($post->author_id);
        $data = compact('post', 'author');
        return view('post.show', $data);
    }
}
