<?php


namespace App\Repo;


use Modules\Blog\Entities\Blog;

class BlogRepo
{
    /**
     * @var Blog
     */
    private $blog;

    /**
     * BlogRepo constructor.
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function getAll()
    {
        $data = $this->blog->orderBy('id','DESC')->get();
        return $data;
    }

    public function getLimited()
    {
        $data = $this->blog->orderBy('id','DESC')->paginate(3);
        return $data;
    }

    public function findById($id)
    {
        return $this->blog->findOrFail($id);
    }


    public function getCount()
    {
        $data = $this->blog->count();
        return $data;
    }
}
