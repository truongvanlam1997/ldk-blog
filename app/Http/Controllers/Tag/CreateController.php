<?php

namespace App\Http\Controllers\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\TagQueryRepository;

class CreateController extends Controller
{
    protected $tagQueryRepository ;

    public function __construct(TagQueryRepository $tagQueryRepository)
    {
        $this->tagQueryRepository = $tagQueryRepository;
    }
    public function create()
    {
        return view('tag.create');
    }
    public function insert(Request $request)
    {
        $data = $request->name;
        $this->tagQueryRepository->updateTagByName($data);
        return redirect()->route('tag.index');
    }
}
