<?php

namespace Modules\Photo\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Photo\Entities\Photo;
use Modules\Photo\Http\Requests\PhotoRequest;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $photos = Photo::all();
        return view('photo::index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('photo::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param PhotoRequest $request
     * @return RedirectResponse
     */
    public function store(PhotoRequest $request)
    {
        try {
            $validateData = $request->all();
            if ($request->hasFile('image')) {
                $validateData['image'] = $request->image->store('public/image');
            }
            Photo::create($validateData);
            return redirect()->route('photo.index')->with('success', 'Photo Feature Created Successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Photo Feature Cannot Be Create');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('photo::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Photo $photo
     * @return Renderable
     */
    public function edit(Photo $photo)
    {
        return view('photo::edit',compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Photo $photo
     * @return RedirectResponse
     */
    public function update(Request $request, Photo $photo)
    {
        try {
            $validateData = $request->all();
            if ($request->hasFile('image')) {
                $validateData['image'] = $request->image->store('public/image');
            }
            $photo->update($validateData);
            return redirect()->route('photo.index')->with('success', 'Photo Feature Updated Successfully');
        } catch (Exception $exception) {
            return back()->with('error', 'Photo Feature Cannot be updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param Photo $photo
     * @return RedirectResponse
     */
    public function destroy(Photo $photo)
    {
        try {
            DB::beginTransaction();
            $photo->delete();
            DB::commit();
            return redirect()->route('photo.index')->with('success', 'Photo Feature Deleted Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('error', 'Cannot Delete Photo Feature Something Went Wrong');
        }
    }
}
