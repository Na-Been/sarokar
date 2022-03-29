<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementRequest;
use App\Models\Advertisement;
use App\Repo\AdvertisementRepo;
use Illuminate\Http\Request;
use Mockery\Exception;

class AdvertisementController extends Controller
{
    /**
     * @var AdvertisementRepo
     */
    private $advertisementRepo;
    /**
     * @var Advertisement
     */
    private $advertisement;

    /**
     * AdvertisementController constructor.
     */
    public function __construct(AdvertisementRepo $advertisementRepo, Advertisement $advertisement)
    {
        $this->advertisementRepo = $advertisementRepo;
        $this->advertisement = $advertisement;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = $this->advertisementRepo->getAll();
        return view('backend.advertisement.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisementRequest $request)
    {
        try {
            if($request->image == null){
                session()->flash('warning','Please get a  Image');
                return back();
            }
            $url = $request->url;

            $reg_exUrl = '/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/';

            if(preg_match($reg_exUrl, $url)) {
                $data = $request->all();

                if ($request->file('image')) {
                    $file = $request->file('image');
                    $fileName = $request->title . date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/advertisement/'), $fileName);
                    $data['image'] = $fileName;
                }
                if(strpos($url,'http://') !== 0){
                    $url = 'http://'.$url;
                }
                $data['url'] = $url;
                $ad = $this->advertisement->create($data);
                if ($ad) {
                    session()->flash('success', 'Ad Added Successfully');
                    return back();
                } else {
                    session()->flash('error', 'Ad could not be Added');
                    return back();
                }
            }else{
                session()->flash('warning', 'Please input valid url...');
                return back();
            }

        }catch (Exception $e){
            $exception = $e->getMessage();
            session()->flash('error','Exception: '.$exception);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = (int)$id;
        try {
            $edits = $this->advertisementRepo->findById($id);
            if ($edits) {
                return view('backend.advertisement.edit', compact('edits'));
            } else {
                session()->flash('error', 'Cannot Update!!!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('success', 'Exception: ' . $exception);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisementRequest $request, $id)
    {
        $id = (int)$id;
        try {

            $url = $request->url;

            $reg_exUrl = '/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/';

            if(preg_match($reg_exUrl, $url)) {

                $data = $request->all();

                $ad = $this->advertisementRepo->findById($id);
                if ($ad) {
                    if ($request->file('image')) {
                        $file = $request->file('image');
                        $fileName = $request->title . date('YmdHis') . "." . $file->getClientOriginalExtension();
                        $file->move(public_path('uploads/advertisement/'), $fileName);
                        $data['image'] = $fileName;
                    }
                }
                $update = $ad->fill($data)->save();
                if ($update) {
                    session()->flash('success', 'Ad Updated Successfully!!');
                    return redirect(route('advertisement.index'));
                } else {
                    session()->flash('error', 'Ad Could not be Updated!!! ');
                    return back();
                }
            }else{
                session()->flash('warning','Please input valid URL....');
                return back();
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('success', 'Exception: ' . $exception);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int)$id;
        try {
            $ad = $this->advertisementRepo->findById($id);
            if ($ad) {
                $ad->delete();
                session()->flash('success', 'Ad Removed Successfully!!!');
                return back();
            } else {
                session()->flash('error', 'Ad could not be removed!!!');
                return back();
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('success', 'Exception: ' . $exception);
            return back();
        }
    }


    public function changeStatus($id)
    {
        $id = (int)$id;
        $value = $this->advertisement->findOrFail($id);
        $this->advertisement
            ->where('id', '=', $id)
            ->update(['status' => ($value->status == '1')?'0':'1']);
    }
}
