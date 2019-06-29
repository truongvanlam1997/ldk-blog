<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\PostQueryRepository;
use App\Models\Contracts\AuthorQueryRepository;

class UpdateController extends Controller
{
    protected $postQueryRepository;
    protected $authorQueryRepository;
    public function __construct(PostQueryRepository $postQueryRepository, AuthorQueryRepository $authorQueryRepository)
    {
        $this->postQueryRepository = $postQueryRepository;
        $this->authorQueryRepository = $authorQueryRepository;
    }
    public function edit($id)
    {
        $author = $this->authorQueryRepository->find($id);

        $data = compact('author');

        return view('author.edit', $data);
    }

    public function update($id, Request $request)
    {
        $post = $request->all();

        // dump($request->only(['title','content','thumbnail','description','author_id','slug','published_at']));
        
    
        $this->authorQueryRepository->update($id, $post);

        $post = $this->authorQueryRepository->find($id);
        $data = compact('author');
        return redirect()->route('author.show', $data);
    }
}
