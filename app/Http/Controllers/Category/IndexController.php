<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entities\Category;
use App\Models\Contracts\CategoryQueryRepository;

class IndexController extends Controller
{
    protected $categoryQueryRepository;
    public function __construct(CategoryQueryRepository $categoryQueryRepository)
    {
        $this->categoryQueryRepository = $categoryQueryRepository;
    }

    public function __invoke()
    {
        $categories = $this->categoryQueryRepository->getAll();

        $data= compact('categories');

        return view('category.index', $data);
    }
}
