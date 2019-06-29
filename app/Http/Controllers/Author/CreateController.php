<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entities\Post;
//use App\Models\Contracts\PostRepository;

use App\Models\Contracts\AuthorQueryRepository;
use App\Models\Repositories\AuthorRepository;

class CreateController extends Controller
{
    protected $authorQueryRepository;
    public function __construct(AuthorQueryRepository $authorQueryRepository)
    {
        $this->authorQueryRepository = $authorQueryRepository;
    }
    public function create()
    {
        return view('author.create');
    }
    public function insert(Request $request)
    {
        $data = $request->all();
        $this->authorQueryRepository->insert($data);
        return  redirect()->route('author.index');
    }
}
