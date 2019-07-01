<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entities\Post;
use App\Models\Entities\Category;
use Illuminate\Support\Str;
//use App\Models\Contracts\PostRepository;
use App\Models\Repositories\AuthorRepository;

use App\Models\Contracts\AuthorQueryRepository;
use App\Models\Contracts\PostQueryRepository;
use App\Models\Contracts\TagQueryRepository;
use App\Models\Contracts\PostTagQueryRepository;
use App\Models\Contracts\CategoryQueryRepository;
use App\Models\Contracts\CategoryPostQueryRepository;

class CreateController extends Controller
{
    protected $postQueryRepository;
    protected $authorQueryRepository;
    protected $tagQueryRepository;
    protected $postTagQueryRepository;
    protected $categoryQueryRepository;
    protected $categoryPostQueryRepository;
    
    public function __construct(PostQueryRepository $postQueryRepository, AuthorQueryRepository $authorQueryRepository, TagQueryRepository $tagQueryRepository, PostTagQueryRepository $postTagQueryRepository, CategoryQueryRepository $categoryQueryRepository, CategoryPostQueryRepository $categoryPostQueryRepository)
    {
        $this->postQueryRepository         = $postQueryRepository;
        $this->authorQueryRepository       = $authorQueryRepository;
        $this->tagQueryRepository          = $tagQueryRepository;
        $this->postTagQueryRepository      = $postTagQueryRepository;
        $this->categoryQueryRepository     = $categoryQueryRepository;
        $this->categoryPostQueryRepository     = $categoryPostQueryRepository;
    }
    public function create()
    {
        // $authorRepository = new AuthorRepository();
        // $authors = $authorRepository->getAll() ;
        // $data = compact('authors');
      
        $authors = $this->authorQueryRepository->getAll();
        // $categories = $this->categoryQueryRepository->getAll();
        $categoryModel =new Category();
        $arrayCategories = $this->categoryQueryRepository->getArrayCategories();
      

        $data = compact('authors', 'categoryModel', 'arrayCategories');
        return view('post.create', $data);
    }
    public function insert(Request $request)
    {
        $data = $request->all();
       
        if ($data['slug'] == null) {
            // $data['slug'] = $this->postQueryRepository->getSlug($data['title']);
            $data['slug'] = Str::slug($data['title'], '-');
        } else {
            $data['slug'] = Str::slug($data['slug'], '-');
        }
        // lưu tag vào bảng Tag .
        $tag =(string) $request->tag;
        $this->tagQueryRepository->updateTagByName($tag);

        // tạo 1 post mới . và trả về postId vừa tạo .
        $postId = $this->postQueryRepository->insert($data);

        // lưu tag vào bảng chung PostTags .
        $idTagOfPost = $this->tagQueryRepository->filterTagIdOfPost($tag); // Lấy danh sách id của các tag mới được thêm vào post
        $this->postTagQueryRepository->insertPostTagTable($postId, $idTagOfPost);

        // Lấy mảng các category id  từ request;
    
        $arrayInputCategoryName = $request->categoryId;
  
        // lưu category vào bảng chung category_posts .
        $this->categoryPostQueryRepository->insertCategoryPostTable($postId, $arrayInputCategoryName);
        

        
        return  redirect()->route('post.index');
    }
}
