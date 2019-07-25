<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\PostQueryRepository;

class SortController extends Controller
{
    protected $postQueryRepository;
    public function __construct(PostQueryRepository $postQueryRepository)
    {
        $this->postQueryRepository =$postQueryRepository;
    }
    public function sort(Request $request, $sort, $order)
    {
        dump($order);
        dd($sort);
        $sortBy = $request->query('sort');
        $order   = $request->query('order');
        $posts = $this->postQueryRepository->sort($sortBy, $order);
        
        $orderBy = ['sort'=>$sortBy,'order'=>$order];
        $data = compact('posts', 'orderBy');

        return view('post.index', $data);
    }
}
