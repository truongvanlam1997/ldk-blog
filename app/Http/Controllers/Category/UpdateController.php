<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\CategoryQueryRepository;

class UpdateController extends Controller
{
    protected $categoryQueryRepository;
  
    public function __construct(CategoryQueryRepository $categoryQueryRepository)
    {
        $this->categoryQueryRepository = $categoryQueryRepository;
    }
    public function edit($id)
    {
        $category = $this->categoryQueryRepository->find($id);
        $categoryNames = $this->categoryQueryRepository->getListParentNames();
     
        $data = compact('category', 'categoryNames');
        return view('category.edit', $data);
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
