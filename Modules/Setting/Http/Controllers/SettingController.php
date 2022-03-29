<?php

namespace Modules\Setting\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isAdminOrSuperAdmin');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('setting::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param SettingRequest $request
     * @return RedirectResponse
     */
    public function store(SettingRequest $request)
    {
        $validateData = $request->except('_token');
        if ($request->hasFile('image')) {
            $validateData['image'] = $request->image->store('public/image');
        }
        try {
            DB::beginTransaction();
            Setting::truncate();
            foreach ($validateData as $key => $value) {
                Setting::insert([
                    'name' => $key,
                    'value' => $value,
                ]);
            }
            DB::commit();
            return redirect()->route('setting.store')->with('success', 'Setting Added Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('setting.store')->with('error', 'Something Went Wrong While Adding Setting');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('setting::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
