<?php

namespace App\Http\Controllers\Author;

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
        $author =  $this->authorQueryRepository->find($id);
        // $author = $this->authorQueryRepository->find($post->author_id);
        $data = compact('author');
        return view('author.show', $data);
    }
}
