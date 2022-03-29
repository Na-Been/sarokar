<?php


namespace App\Repo;


use Modules\Page\Entities\Page;

class PageRepo
{
    /**
     * @var Page
     */
    private $page;

    /**
     * PageRepo constructor.
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function getAll($parentId=0)
    {
        $data = $this->page->where('parent_id',$parentId)->orderBy('id','DESC')->get();
        return $data;
    }

    public function findById($id)
    {
        return $this->page->findOrFail($id);
    }


    public function getChildPage($id)
    {
        $data = $this->page->where('parent_id',$id)->get();
        return $data;
    }


    public static function getParentName($id)
    {
        $parentName = Page::find($id);
        return $parentName->title;
    }

    public function getParentPages()
    {
        $data = $this->page->where('status','1')->where('parent_id',0)->orderBy('order','ASC')->get();
        return $data;
    }

}
