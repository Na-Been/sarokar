<?php


namespace App\Repo;


use Modules\Blog\Entities\Blog;
use Modules\Blog\Entities\BlogCategory;

class BlogCategoryRepo
{
    /**
     * @var BlogCategory
     */
    private $blogCategory;
    /**
     * @var Blog
     */
    private $blog;

    /**
     * BlogCategoryRepo constructor.
     */
    public function __construct(BlogCategory $blogCategory, Blog $blog)
    {
        $this->blogCategory = $blogCategory;
        $this->blog = $blog;
    }

    public function getAll()
    {
        $data = $this->blogCategory->orderBy('id', 'DESC')->get();
        return $data;
    }

    public function findById($id)
    {
        return $this->blogCategory->findOrFail($id);
    }

    public function getChildBlogs($id)
    {
        $data = $this->blog->where('category_id', $id)->get();
        return $data;
    }


    public function getCount()
    {
        $data = $this->blogCategory->count();
        return $data;
    }
}
