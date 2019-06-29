<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\AuthorQueryRepository;

class DeleteController extends Controller
{
    protected $authorQueryRepository ;

    public function __construct(AuthorQueryRepository $authorQueryRepository)
    {
        $this->authorQueryRepository = $authorQueryRepository;
    }
    public function __invoke($id)
    {
        $this->authorQueryRepository->delete($id);
        return  redirect()->route('author.index');
    }
}
