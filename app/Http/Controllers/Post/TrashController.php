<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\PostQueryRepository;

class TrashController extends Controller
{
    protected $postQueryRepository;

    public function __construct(PostQueryRepository $postQueryRepository)
    {
        $this->postQueryRepository = $postQueryRepository;
    }
    public function __invoke($id)
    {
        $this->postQueryRepository->delete($id);
        return  redirect()->route('post.index');
    }
}
