<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entities\Post;
use App\Models\Contracts\PostQueryRepository;

class IndexController extends Controller
{
    protected $postqueryRepository;
    public function __construct(PostQueryRepository $postqueryRepository)
    {
        $this->postqueryRepository = $postqueryRepository;
    }
    public function __invoke()
    {
        $posts = $this->postqueryRepository->getAll();

        $data= compact('posts');

        return view('post.index', $data);
    }
}
