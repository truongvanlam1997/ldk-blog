<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\PostQueryRepository;

class IndexTrashController extends Controller
{
    protected $postqueryRepository;
    public function __construct(PostQueryRepository $postqueryRepository)
    {
        $this->postqueryRepository = $postqueryRepository;
    }
    public function __invoke()
    {
        $postTrashes = $this->postqueryRepository->getAllTrash();

        $data= compact('postTrashes');
        //dd($postTrashes);

        return view('post.index-trash', $data);
    }
}
