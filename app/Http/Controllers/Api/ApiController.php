<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Video;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Modules\News\Entities\Category;
use Modules\News\Entities\News;
use Modules\News\Entities\NewsCategory;
use Modules\Setting\Entities\Setting;

class ApiController extends Controller
{
    public function index()
    {
        try {
            $data['ads'] = Advertisement::where(['page' => 1, 'status' => 1])->get();
            $data['newsCategories'] = Category::all();
            $data['flashNews'] = displayFlashNews();
            $data['getFirstCategoryData'] = displayFirstCategoryData();
            $data['getSecondCategoryData'] = displaySecondCategoryData();
            $data['getThirdCategoryData'] = displayThirdCategoryData();
            $data['getFourthCategoryData'] = displayFourthCategoryData();
            $data['getFifthCategoryData'] = displayFifthCategoryData();
            $data['getSixthCategoryData'] = displaySixthCategoryData();
            $data['getSeventhCategoryData'] = displaySeventhCategoryData();
            $data['getEighthCategoryData'] = displayEighthCategoryData();
            $data['getNinthCategoryData'] = displayNinthCategoryData();
            $data['getTenthCategoryData'] = displayTenthCategoryData();
            $data['getEleventhCategory'] = displayEleventhCategory();
            $data['getTwelfthCategory'] = displayTwelfthCategory();
            $data['getThirteenCategory'] = displayThirteenCategory();
            $data['getFourteenCategory'] = displayFourteenCategory();
            $data['getFifteenCategory'] = displayFifteenCategory();
            $data['getLatestFiveNews'] = getLatestFiveNews();
            $data['getVideoSection'] = getVideoSection();
            return response()->json($data);
        } catch (\Exception $exception) {
            return response()->json('Something Went Wrong. Please Try Again Later');
        }
    }

    public function allCategoryList()
    {
        try {
            $categories = Category::all();
            return response()->json($categories);
        } catch (\Exception $e) {
            return response()->json('Something Went Wrong. Please Try Again Later');
        }
    }

    public function newsCategoryDetails($slug)
    {
        try {
            $newsCategory = Category::where('slug', $slug)->first();
            $perPage = request('per_page');
            if ($perPage) {
                $news = NewsCategory::where('category_id', $newsCategory->id)->with(['news', 'category'])->get()->pluck('news')->sortByDesc('news.created_at');
                $data['news'] = $this->paginateCollection($news, $perPage);
            } else {
                $news = NewsCategory::where('category_id', $newsCategory->id)->with(['news', 'category'])->get()->pluck('news')->sortByDesc('news.created_at');
                $data['news'] = $this->paginateCollection($news, 10);
            }
            $data['ads'] = Advertisement::where(['page' => 2, 'status' => 1])->get();
            $data['latestNews'] = getLatestFiveNews();
            return response()->json($data)->getData(true);
        } catch (\Exception $exception) {
            return response()->json('Something Went Wrong. Please Try Again Later');
        }
    }

    function paginateCollection($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $lap = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        return [
            'current_page' => $lap->currentPage(),
            'data' => $lap->values(),
            'first_page_url' => $lap->url(1),
            'from' => $lap->firstItem(),
            'last_page' => $lap->lastPage(),
            'last_page_url' => $lap->url($lap->lastPage()),
            'next_page_url' => $lap->nextPageUrl(),
            'per_page' => $lap->perPage(),
            'prev_page_url' => $lap->previousPageUrl(),
            'to' => $lap->lastItem(),
            'total' => $lap->total(),
        ];
    }

    public function newsDetail($slug)
    {
        try {
            $news = News::where('slug', $slug)->first();
            if ($news) {
                $news->share += 1;
                $news->save();
            }
            $data['news'] = $news;
            $data['ads'] = Advertisement::where(['page' => 2, 'status' => 1])->get();
            $data['latestNews'] = getLatestFiveNews();
            $data['relatedNews'] = getAllNews()->take(6);
            return response()->json($data);
        } catch (\Exception $exception) {
            return response()->json('Something Went Wrong. Please Try Again Later');
        }
    }

    public function allVideosList()
    {
        try {
            $perPage = request('per_page');
            if ($perPage) {
                $data['videos'] = Video::latest()->paginate($perPage);
            } else {
                $data['videos'] = Video::latest()->paginate(10);
            }
            $data['ads'] = Advertisement::where(['page' => 3, 'status' => 1])->get();
            return response()->json($data);
        } catch (\Exception $exception) {
            return response()->json('Something Went Wrong. Please Try Again Later');
        }
    }

    public function allSettingList()
    {
        try {
            $setting = Setting::all();
            return response()->json($setting);
        } catch (\Exception $e) {
            return response()->json('Something Went Wrong. Please Try Again Later');
        }
    }

}
