<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entities\Author;
use App\Models\Contracts\AuthorQueryRepository;

class IndexController extends Controller
{
    protected $authorQueryRepository;
    public function __construct(AuthorQueryRepository $authorQueryRepository)
    {
        $this->authorQueryRepository = $authorQueryRepository;
    }
    public function __invoke()
    {
        $authors = $this->authorQueryRepository->getAll();
        $data= compact('authors');
        return view('author.index', $data);
    }
}
