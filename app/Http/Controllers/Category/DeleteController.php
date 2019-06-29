<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contracts\CategoryQueryRepository;

class DeleteController extends Controller
{
    protected $categoryQueryRepository ;

    public function __construct(CategoryQueryRepository $categoryQueryRepository)
    {
        $this->categoryQueryRepository = $categoryQueryRepository;
    }
    public function __invoke($id)
    {
        $this->categoryQueryRepository->delete($id);
        return  redirect()->route('category.index');
    }
}
