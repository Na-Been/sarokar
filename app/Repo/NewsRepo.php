<?php


namespace App\Repo;


use Modules\News\Entities\News;
use Modules\News\Entities\NewsCategory;

class NewsRepo
{
    /**
     * @var News
     */
    private $news;

    /**
     * NewsRepo constructor.
     * @param News $news
     */
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function getAll()
    {
        $data = $this->news->orderBy('id', 'DESC')->get();
        return $data;
    }

    public function findById($id)
    {
        return $this->news->findOrFail($id);
    }

    public function getLimited()
    {
        return $this->news->orderBy('id', 'DESC')->paginate(9);
    }

    public function getCount()
    {
        $data = $this->news->count();
        return $data;
    }

    public function getByCategoryId($id)
    {
        return $this->news->where('category_id', $id)->where('status', 1)->get();

    }

    public function allNewsByCategorySlug($id)
    {
        $news = NewsCategory::where('category_id', $id)->with(['news', 'category'])->paginate(13);
        return $news->setCollection($news->sortByDesc('news.created_at'));
    }

    public function allNewsBySubCategorySlug($id)
    {
        return NewsCategory::where('sub_category_id', $id)->with(['news', 'category'])->get()->sortByDesc('news.created_at');
    }

    public function findBySlug($slug)
    {
        return $this->news->where('slug', $slug)->first();
    }

    public function getActiveNews()
    {
        return $this->news->where('status', 1)->orderBy('id', 'DESC')->get();
    }

    /**
     * @param $request
     * @return string
     */
    public function storeOrUpdateImage($request)
    {
        $file = $request->file('image');
        $fileName = $request->name . date('YmdHis') . "." . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/news/'), $fileName);
        return $fileName;
    }

    /**
     * @param $request
     * @param $news_id
     * @return array
     */
    public function storePivotAttributes($request, $news_id)
    {
        $newsCategories['category_id'] = $request->category_id;
        $newsCategories['sub_category_id'] = $request->sub_category_id;
        $totalSubCategory = 0;
        $totalCategory = 0;
        if ($newsCategories['sub_category_id']) {
            $totalSubCategory = count($newsCategories['sub_category_id']);
        }
        if ($newsCategories['category_id']) {
            $totalCategory = count($newsCategories['category_id']);
        }
        $values = $totalSubCategory > $totalCategory ? $newsCategories['sub_category_id'] : $newsCategories['category_id'];
        foreach ($values as $key => $value) {
            NewsCategory::insert([
                'news_id' => $news_id,
                'category_id' => $newsCategories['category_id'][$key] ?? null,
                'sub_category_id' => $newsCategories['sub_category_id'][$key] ?? null,
            ]);
        }
    }
}
