<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\PostQueryRepository;

class BulkController extends Controller
{
    protected $postQueryRepository;

    public function __construct(PostQueryRepository $postQueryRepository)
    {
        $this->postQueryRepository = $postQueryRepository;
    }
    public function __invoke(Request $request)
    {
        $arrayPostId = $request->postId;
        $bulkAction = $request->bulkAction;
        $this->postQueryRepository->bulk($arrayPostId, $bulkAction);
        return redirect()->back();
    }
}
