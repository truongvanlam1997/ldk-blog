<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entities\Post;
use Illuminate\Support\Str;
//use App\Models\Contracts\PostRepository;
use App\Models\Repositories\AuthorRepository;

use App\Models\Contracts\AuthorQueryRepository;
use App\Models\Contracts\PostQueryRepository;
use App\Models\Contracts\TagQueryRepository;
use App\Models\Contracts\PostTagQueryRepository;

class CreateController extends Controller
{
    protected $postQueryRepository;
    protected $authorQueryRepository;
    protected $tagQueryRepository;
    protected $postTagQueryRepository;
    
    public function __construct(PostQueryRepository $postQueryRepository, AuthorQueryRepository $authorQueryRepository, TagQueryRepository $tagQueryRepository, PostTagQueryRepository $postTagQueryRepository)
    {
        $this->postQueryRepository = $postQueryRepository;
        $this->authorQueryRepository = $authorQueryRepository;
        $this->tagQueryRepository = $tagQueryRepository;
        $this->postTagQueryRepository = $postTagQueryRepository;
    }
    public function create()
    {
        // $authorRepository = new AuthorRepository();
        // $authors = $authorRepository->getAll() ;
        // $data = compact('authors');
      
        $authors = $this->authorQueryRepository->getAll();
        $data = compact('authors');
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

        // tạo 1 post mới .
        $postId = $this->postQueryRepository->insert($data);

        // lưu tag vào bảng chung PostTags .
        $idTagOfPost = $this->tagQueryRepository->filterTagIdOfPost($tag); // Lấy danh sách id của các tag mới được thêm vào post
        $this->postTagQueryRepository->updatePostTagTable($postId, $idTagOfPost);

        

        
        return  redirect()->route('post.index');
    }
}
