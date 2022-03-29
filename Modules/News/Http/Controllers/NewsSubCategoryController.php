<?php

namespace Modules\News\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\News\Entities\Category;
use Modules\News\Entities\NewsCategory;
use Modules\News\Entities\NewsSubCategory;
use Modules\News\Http\Requests\NewsSubCategoryRequest;

class NewsSubCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $subCategories = NewsSubCategory::all();
        return view('news::newsSubCategory.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::all();
        return view('news::newsSubCategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param NewsSubCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(NewsSubCategoryRequest $request)
    {
        try {
            $validateInputs = $request->all();
            DB::beginTransaction();
            $validateInputs['slug'] = str_replace(' ','-',$request->sub_category_name);
            $validateInputs['user_id'] = Auth::id();
            NewsSubCategory::create($validateInputs);
            DB::commit();
            return redirect()->route('news-sub-category.create')->with('success', 'Sub Category Added Successfully');
        } catch (Exception $exception) {
            DB::rollback();
            return back()->with('error', 'Cannot Store News Sub Category');
        }

    }

    /**
     * Show the form for editing the specified resource.
     * @param NewsSubCategory $newsSubCategory
     * @return Renderable
     */
    public function edit(NewsSubCategory $newsSubCategory)
    {
        $categories = Category::all();
        return view('news::newsSubCategory.edit', compact('newsSubCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param NewsSubCategoryRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(NewsSubCategoryRequest $request, $id)
    {
        $validateInputs = $request->all();
        $newsSubCategory = NewsSubCategory::findOrFail($id);
        try {
            DB::beginTransaction();
            $validateInputs['slug'] = $request->sub_category_name;
            $validateInputs['user_id'] = Auth::id();
            $newsSubCategory->update($validateInputs);
            DB::commit();
            return redirect()->route('news-sub-category.index')->with('success', 'News Sub Category Updated Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('error', 'Cannot Update News Sub Category');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param NewsSubCategory $newsSubCategory
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $newsSubCategory = NewsSubCategory::findOrFail($id);

            if ($newsSubCategory) {
                $subCategory = NewsCategory::where('sub_category_id', $newsSubCategory->id)->get();

                if (count($subCategory) > 0) {
                    session()->flash('warning', 'Please Delete Its News First');
                    return back();
                }
                $newsSubCategory->delete();
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
