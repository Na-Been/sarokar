<?php

namespace Modules\Blog\Http\Controllers;

use App\Repo\BlogCategoryRepo;
use App\Repo\BlogRepo;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    /**
     * @var BlogRepo
     */
    private $blogRepo;
    /**
     * @var Blog
     */
    private $blog;
    /**
     * @var BlogCategoryRepo
     */
    private $blogCategoryRepo;

    /**
     * BlogController constructor.
     * @param BlogRepo $blogRepo
     * @param Blog $blog
     * @param BlogCategoryRepo $blogCategoryRepo
     */
    public function __construct(BlogRepo $blogRepo, Blog $blog, BlogCategoryRepo $blogCategoryRepo)
    {
        $this->blogRepo = $blogRepo;
        $this->blog = $blog;
        $this->blogCategoryRepo = $blogCategoryRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $blogs = $this->blogRepo->getLimited();
        return view('blog::blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $cats = $this->blogCategoryRepo->getAll();
        return view('blog::blog.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     * @param BlogRequest $request
     * @return RedirectResponse
     */
    public function store(BlogRequest $request)
    {
        try {
            $data = $request->all();
            $slug = str_replace('-', ' ', $request->title);
            $data['slug'] = Str::slug($slug . date('YmdHis'), '-');

            if ($request->file('image')) {
                $file = $request->file('image');
                $fileName = $request->name . date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/blog/'), $fileName);
                $data['image'] = $fileName;
            }
            $data['user_id'] = Auth::user()->id;
            $blog = $this->blog->create($data);
            if ($blog) {
                session()->flash('success', 'Blog Successfully Created!');
                return back();
            } else {
                session()->flash('error', 'Blog could not be Create!');
                return back();
            }
        } catch (Exception $e) {
            session()->flash('error', 'Exception : ' . $e);
            return back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function show($id)
    {
        $id = (int)$id;
        try {
            $blog = $this->blogRepo->findById($id);
            if ($blog) {
                return view('blog::blog.show', compact('blog'));
            } else {
                session()->flash('error', 'Blog could not be Found!');
                return back();
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
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
            $blog = $this->blogRepo->findById($id);
            if ($blog) {
                $cats = $this->blogCategoryRepo->getAll();
                return view('blog::blog.edit', compact('blog','cats'));
            } else {
                session()->flash('error', 'Blog could not be update!');
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
     * @return Application|Renderable|RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $id = (int)$id;
        try {
            $data = $request->all();
            $blog = $this->blogRepo->findById($id);
            if ($blog) {
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $fileName = $request->name . date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/blog/'), $fileName);
                    $data['image'] = $fileName;
                }
                $update = $blog->fill($data)->save();
                if ($update) {
                    session()->flash('success', 'Blog Successfully updated!');
                    return redirect(route('blog.index'));
                } else {
                    session()->flash('error', 'Blog could not be update!');
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
            $blog = $this->blogRepo->findById($id);
            if ($blog) {
                $blog->delete();
                session()->flash('success', 'Blog successfully deleted!');
                return back();
            } else {
                session()->flash('error', 'Blog could not be delete!');
                return back();
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION' . $exception);
            return back();
        }
    }

    public function changeStatus($id)
    {
        $id = (int)$id;
        $value = $this->blog->findOrFail($id);
        $this->blog
            ->where('id', '=', $id)
            ->update(['status' => ($value->status == '1')?'0':'1']);
    }
}
