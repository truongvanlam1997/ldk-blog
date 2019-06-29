<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\CategoryQueryRepository;

class ShowController extends Controller
{
    protected $categoryQueryRepository;

    public function __construct(CategoryQueryRepository $categoryQueryRepository)
    {
        $this->categoryQueryRepository = $categoryQueryRepository;
    }
    public function __invoke($id)
    {
        $category =  $this->categoryQueryRepository->find($id);
  
        $data = compact('category');
        return view('category.show', $data);
    }
}
