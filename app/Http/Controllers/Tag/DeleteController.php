<?php

namespace App\Http\Controllers\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\TagQueryRepository;

class DeleteController extends Controller
{
    protected $tagQueryRepository ;
    
    public function __construct(TagQueryRepository $tagQueryRepository)
    {
        $this->tagQueryRepository = $tagQueryRepository;
    }
    public function __invoke($id)
    {
        $this->tagQueryRepository->delete($id);
        return redirect()->route('tag.index');
    }
}
