<?php

namespace Modules\Blog\Http\Controllers;

use App\Repo\BlogCategoryRepo;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Http\Requests\BlogCategoryRequest;

class BlogCategoryController extends Controller
{
    /**
     * @var BlogCategory
     */
    private $blogCategory;
    /**
     * @var BlogCategoryRepo
     */
    private $blogCategoryRepo;

    /**
     * BlogCategoryController constructor.
     * @param BlogCategory $blogCategory
     * @param BlogCategoryRepo $blogCategoryRepo
     */
    public function __construct(BlogCategory $blogCategory, BlogCategoryRepo $blogCategoryRepo)
    {
        $this->blogCategory = $blogCategory;
        $this->blogCategoryRepo = $blogCategoryRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $blogCategories = $this->blogCategoryRepo->getAll();
        return view('blog::blogCategory.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::blogCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param BlogCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(BlogCategoryRequest $request)
    {
        try {
            $data = $request->all();
            $slug = str_replace('-', ' ', $request->title);
            $data['slug'] = Str::slug($slug . date('YmdHis'), '-');
            $data['user_id'] = Auth::user()->id;
            $blogCat = $this->blogCategory->create($data);
            if ($blogCat) {
                session()->flash('success', 'Blog Category Successfully Created!');
                return back();
            } else {
                session()->flash('error', 'Blog Category could not be Create!');
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
            $blogCat = $this->blogCategoryRepo->findById($id);
            if ($blogCat) {
                return view('blog::blogCategory.edit', compact('blogCat'));
            } else {
                session()->flash('error', 'Blog Category could not be update!');
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
     * @param Request $request
     * @param int $id
     * @return Application|Renderable|RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BlogCategoryRequest $request, $id)
    {
        $id = (int)$id;
        try {
            $data = $request->all();
            $blogCat = $this->blogCategoryRepo->findById($id);
            if ($blogCat) {
                $slug = str_replace('-', ' ', $request->title);
                $data['slug'] = Str::slug($slug . date('YmdHis'), '-');
                $update = $blogCat->fill($data)->save();
                if ($update) {
                    session()->flash('success', 'Blog Category Successfully updated!');
                    return redirect(route('blog-category.index'));
                } else {
                    session()->flash('error', 'Blog Category could not be update!');
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
    public function destroy($id)
    {
        $id = (int)$id;
        try {
            $blogCat = $this->blogCategoryRepo->findById($id);
            $blogs = $this->blogCategoryRepo->getChildBlogs($id);
            if ($blogCat) {
                if(count($blogs)>0){
                    session()->flash('warning', 'Please Delete Its Blog First');
                    return back();
                }
                $blogCat->delete();
                session()->flash('success', 'Blog Category successfully deleted!');
                return back();
            } else {
                session()->flash('error', 'Blog Category could not be delete!');
                return back();
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION' . $exception);
            return back();
        }
    }
}
