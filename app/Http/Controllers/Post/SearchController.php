<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\PostQueryRepository;

class SearchController extends Controller
{
    protected $postQueryRepository;

    public function __construct(PostQueryRepository $postQueryRepository)
    {
        $this->postQueryRepository = $postQueryRepository;
    }
    public function search(Request $request)
    {
        $searchBy = $request->searchBy;
        $searchTitle  = $request->searchTitle;
        $posts = $this->postQueryRepository->search($searchTitle, $searchBy);
        $orderBy =['searchBy' => $searchBy, 'searchTitle' =>$searchTitle ];
        $data = compact('posts', 'orderBy');
        return view('post.index', $data);
    }
    public function searchTrash(Request $request)
    {
        $searchBy = $request->searchBy;
        $searchTitle  = $request->searchTitle;
        $posts = $this->postQueryRepository->searchTrash($search, $searchBy);
    }
}
