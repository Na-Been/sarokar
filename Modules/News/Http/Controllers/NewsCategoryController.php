<?php

namespace Modules\News\Http\Controllers;

use App\Repo\NewsCategoryRepo;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\News\Entities\Category;
use Modules\News\Entities\News;
use Modules\News\Entities\NewsCategory;
use Modules\News\Http\Requests\NewsCategoryRequest;

class NewsCategoryController extends Controller
{
    /**
     * @var NewsCategoryRepo
     */
    private $newsCategoryRepo;
    /**
     * @var NewsCategory
     */
    private $newsCategory;

    /**
     * NewsCategoryController constructor.
     * @param NewsCategoryRepo $newsCategoryRepo
     * @param Category $newsCategory
     */
    public function __construct(NewsCategoryRepo $newsCategoryRepo, Category $newsCategory)
    {
        $this->newsCategoryRepo = $newsCategoryRepo;
        $this->newsCategory = $newsCategory;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $newsCategories = $this->newsCategoryRepo->getAll();
//        dd($newsCategories);
        $highlightNews = [];
        foreach ($newsCategories as $newsCategory) {
            if ($newsCategory->highlight_news_id) {
                $highlightNew = News::whereId($newsCategory->highlight_news_id)->pluck('title');
                array_push($highlightNews, $highlightNew);
            }
        }
//        dd($highlightNew,$highlightNews);
        return view('news::newsCategory.index', compact('newsCategories','highlightNews'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('news::newsCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param NewsCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(NewsCategoryRequest $request)
    {
        try {
            $data = $request->all();
            $slug = str_replace('-', ' ', $request->title);
            $data['slug'] = Str::slug($slug . date('YmdHis'), '-');
            $data['user_id'] = Auth::id();
            $newsCat = $this->newsCategory->create($data);
            if ($newsCat) {
                session()->flash('success', 'News Category Successfully Created!');
                return back();
            } else {
                session()->flash('error', 'News Category could not be Create!');
                return back();
            }
        } catch (Exception $e) {
            session()->flash('error', 'Exception : ' . $e);
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id)
    {
        $id = (int)$id;
        try {
            $newsCat = $this->newsCategoryRepo->findById($id);
            $news = $this->newsCategoryRepo->getNews($id);
            if ($newsCat) {
                return view('news::newsCategory.edit', compact('newsCat', 'news'));
            } else {
                session()->flash('error', 'News Category could not be update!');
                return back();
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param NewsCategoryRequest $request
     * @param int $id
     * @return Application|Renderable|RedirectResponse|Redirector
     */
    public function update(NewsCategoryRequest $request, $id)
    {
        $id = (int)$id;
        try {
            $data = $request->all();
            $newsCat = $this->newsCategoryRepo->findById($id);
            if ($newsCat) {
                $slug = str_replace('-', ' ', $request->title);
                $data['slug'] = Str::slug($slug . date('YmdHis'), '-');
                $update = $newsCat->fill($data)->save();
                if ($update) {
                    session()->flash('success', 'News Category Successfully updated!');
                    return redirect(route('news-category.index'));
                } else {
                    session()->flash('error', 'News Category could not be update!');
                    return back();
                }
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        try {
            $newsCat = $this->newsCategoryRepo->findById($id);
//            $news = $this->newsCategoryRepo->getChildNews($id);
            if ($newsCat) {
//                if (count($news) > 0) {
//                    session()->flash('warning', 'Please Delete Its News First');
//                    return back();
//                }
                $newsCat->delete();
                session()->flash('success', 'News Category successfully deleted!');
                return back();
            } else {
                session()->flash('error', 'News Category could not be delete!');
                return back();
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION' . $exception);
            return back();
        }
    }
}
