<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entities\Category;



use App\Models\Contracts\CategoryQueryRepository;

class CreateController extends Controller
{
    protected $categoryQueryRepository;

    public function __construct(CategoryQueryRepository $categoryQueryRepository)
    {
        $this->categoryQueryRepository = $categoryQueryRepository;
    }
    public function create()
    {
       
        // $categoryNames = new Category();
        // $categoryNames = $categoryNames->getListParentNames();
        // dd($categoryNames);
        $categoryNames = $this->categoryQueryRepository->getListParentNames();
        $data = compact('categoryNames');

        return view('category.create', $data);
    }
    public function insert(Request $request)
    {
        $data = $request->all();

        $this->categoryQueryRepository->insert($data);
        return  redirect()->route('category.index');
    }
}
