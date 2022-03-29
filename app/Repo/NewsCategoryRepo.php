<?php


namespace App\Repo;


use Modules\News\Entities\Category;
use Modules\News\Entities\News;
use Modules\News\Entities\NewsCategory;

class NewsCategoryRepo
{
    /**
     * @var NewsCategory
     */
    private $newsCategory;
    /**
     * @var News
     */
    private $news;

    /**
     * NewsCategoryRepo constructor.
     * @param Category $newsCategory
     * @param News $news
     */
    public function __construct(Category $newsCategory, News $news)
    {
        $this->newsCategory = $newsCategory;
        $this->news = $news;
    }

    public function getAll()
    {
        return $this->newsCategory->orderBy('order', 'ASC')->get();
    }

    public function getTen()
    {
        return $this->newsCategory->take(8)->orderBy('order')->get();
    }

    public function findById($id)
    {
        return $this->newsCategory->findOrFail($id);
    }

    public function getChildNews($id)
    {
        return $this->news->where('category_id', $id)->get();
    }

    public function getCount()
    {
        return $this->newsCategory->count();
    }

    public function findBySlug($slug)
    {
        return $this->newsCategory->where('slug', $slug)->first();
    }

    public function getNews($id)
    {
        $newsCate = NewsCategory::where('category_id', $id)->get();
        $news = [];
        foreach ($newsCate as $newsc) {
            $new = $this->news->whereId($newsc->news_id)->get();
            array_push($news, $new);
        }
        return $news;
    }
}
