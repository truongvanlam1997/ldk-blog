<?php

namespace App\Http\Controllers\Post;

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
        $post = $this->postQueryRepository->find($id);

        $authors = $this->authorQueryRepository->getAll();
        $data = compact('post', 'authors');
        return view('post.edit', $data);
    }
    public function update($id, Request $request)
    {
        $post = $request->all();

        // dump($request->only(['title','content','thumbnail','description','author_id','slug','published_at']));
        
    
        $this->postQueryRepository->update($id, $post);

        $post = $this->postQueryRepository->find($id);
        $data = compact('post');
        return redirect()->route('post.show', $data);
    }
}
