<?php

namespace Modules\Page\Http\Controllers;

use App\Repo\PageRepo;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mockery\Exception;
use Modules\Page\Entities\Page;
use Modules\Page\Http\Requests\PageRequest;

class PageController extends Controller
{
    /**
     * @var PageRepo
     */
    private $pageRepo;
    /**
     * @var Page
     */
    private $page;

    /**
     * PageController constructor.
     */
    public function __construct(PageRepo $pageRepo, Page $page)
    {
        $this->pageRepo = $pageRepo;
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $id = (int)$request->get('id');
        $pages = $this->pageRepo->getAll($id);
        return view('page::index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $pages = $this->pageRepo->getAll();
        return view('page::create',compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PageRequest $request)
    {
        try{
            $data = $request->all();
            if($request->parent_id == null){
                $data['parent_id'] = 0 ;
            }
            $slug = str_replace('-', ' ', $request->title);
            $data['slug'] = Str::slug($slug . date('YmdHis'), '-');
            $data['user_id'] = Auth::user()->id;
            $page = $this->page->create($data);
            if ($page) {
                session()->flash('success', 'Page Successfully Created!');
                return back();
            } else {
                session()->flash('error', 'Page could not be Create!');
                return back();
            }
        }catch (Exception $e){
            $exception = $e->getMessage();
            session()->flash('error', 'Exception: '.$exception);
            return back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $id = (int)$id;
        try{
            $id = (int)$id;
            $page = $this->pageRepo->findById($id);
            if ($page) {
                return view('page::show', compact('page'));
            } else {
                session()->flash('error', 'Page could not be Found!');
                return back();
            }
        }catch (Exception $e){
            session()->flash('error', 'Exception : ' . $e);
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $id = (int)$id;
        try{
            $page = $this->pageRepo->findById($id);
            if($page){
                $pages = $this->pageRepo->getAll();
                return view('page::edit',compact('page','pages'));
            }else{
                session()->flash('error','Page could not be updated!!!');
                return back();
            }
        }catch (Exception $e){
            $exception = $e->getMessage();
            session()->flash('error','Exception:'.$exception);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PageRequest $request, $id)
    {
        $id = (int)$id;
        try{
            $data = $request->all();
            if($request->parent_id == null){
                $data['parent_id'] = 0;
            }
            $slug = str_replace('-', ' ', $request->title);
            $data['slug'] = Str::slug($slug . date('YmdHis'), '-');
            $page = $this->pageRepo->findById($id);
            if($page){
                $update =$page->fill($data)->save();
                if($update){
                    session()->flash('success','Page Updated Successfully');
                    return redirect(route('page.index'));
                }else{
                    session()->flash('error','Page could not be Updated!!');
                    return back();
                }
            }
        }catch (Exception $e){
            session()->flash('error','Exception: '.$e);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $id = (int)$id;
        try{
            $page = $this->pageRepo->findById($id);
            $otherPage = $this->pageRepo->getChildPage($id);
            if($page){
                if(count($otherPage)>0){
                    session()->flash('warning', 'Please Delete Its Child Page First');
                    return back();
                }
                $page->delete();
                session()->flash('success','Page Deleted Successfully!!');
                return back();
            }else{
                session()->flash('error','Page could not be deleted!!');
                return back();
            }
        }catch (Exception $e){
            $exception = $e->getMessage();
            session()->flash('Error','Exception: '.$exception);
            return back();
        }
    }


    public function changeStatus($id)
    {
        $id = (int)$id;
        $value = $this->page->findOrFail($id);
        $this->page
            ->where('id', '=', $id)
            ->update(['status' => ($value->status == '1')?'0':'1']);
        return back();
    }
}
