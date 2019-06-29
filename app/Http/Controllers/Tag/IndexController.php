<?php

namespace App\Http\Controllers\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\TagQueryRepository;

class IndexController extends Controller
{
    protected $tagQueryRepository ;

    public function __construct(TagQueryRepository $tagQueryRepository)
    {
        $this->tagQueryRepository = $tagQueryRepository;
    }
    public function __invoke()
    {
        $tags =$this->tagQueryRepository->getAll();
        $data = compact('tags');

        return view('tag.index', $data);
    }
}
