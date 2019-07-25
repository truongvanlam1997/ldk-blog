<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\PostQueryRepository;

class CloneController extends Controller
{
    protected $postQueryRepository;

    public function __construct(PostQueryRepository $postQueryRepository)
    {
        $this->postQueryRepository = $postQueryRepository;
    }
    public function __invoke($id)
    {
        $this->postQueryRepository->clone($id);
        
        return redirect()->back();
    }
}
