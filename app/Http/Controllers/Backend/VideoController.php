<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use App\Repo\VideoRepo;

class VideoController extends Controller
{
    /**
     * @var VideoRepo
     */
    private $videoRepo;
    /**
     * @var Video
     */
    private $video;

    /**
     * VideoController constructor.
     */
    public function __construct(VideoRepo $videoRepo, Video $video)
    {
        $this->videoRepo = $videoRepo;
        $this->video = $video;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = $this->videoRepo->getAll();
        return view('backend.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        try {
            $url = $request->url;
            if ($url == null) {
                session()->flash('warning', 'Please input video url.');
                return back();
            }
            $rx = '~^(?:https?://)? (?:www[.])? (?:youtube[.]com/watch[?]v=|youtu[.]be/) ([^&]{11})~x';
            $has_match = preg_match($rx, $url, $matches);
            if ($has_match) {
                $data = $request->all();
                $video = $this->video->create($data);
                if ($video) {
                    session()->flash('success', 'Video Added Successfully');
                    return back();
                } else {
                    session()->flash('error', 'Video Cannot be Added!!');
                    return back();
                }
            } else {
                session()->flash('warning', 'Please input valid video url.');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'Exception : ' . $exception);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = (int)$id;
        try {
            $edits = $this->videoRepo->findById($id);
            if ($edits) {
                return view('backend.video.edit', compact('edits'));
            } else {
                session()->flash('error', 'Update unsuccessful');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'Exception : ' . $exception);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $id)
    {
        $id = (int)$id;
        try {

            $url = $request->url;
            if ($url == null) {
                session()->flash('warning', 'Please input video url.');
                return back();
            }
            $rx = '~^(?:https?://)? (?:www[.])? (?:youtube[.]com/watch[?]v=|youtu[.]be/) ([^&]{11})~x';
            $has_match = preg_match($rx, $url, $matches);
            if ($has_match) {
                $data = $request->all();
                $videos = $this->videoRepo->findById($id);

                $update = $videos->fill($data)->save();
                if ($update) {
                    session()->flash('success', 'Video Successfully updated!');
                    return back();
                } else {
                    session()->flash('error', 'Video could not be updated!');
                    return back();
                }
            } else {
                session()->flash('warning', 'Please input valid video url.');
                return back();
            }

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int)$id;
        try {
            $video = $this->videoRepo->findById($id);

            if ($video) {
                $video->delete();
                session()->flash('success', 'Video removed successfully!!');
                return back();
            } else {
                session()->flash('error', 'Video cannot be removed!!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'Exception: ' . $exception);
            return back();
        }
    }


    public function changeStatus($id)
    {
        $id = (int)$id;
        $value = $this->video->findOrFail($id);
        $this->video
            ->where('id', '=', $id)
            ->update(['status' => ($value->status == '1') ? '0' : '1']);
    }

    public function media()
    {
        return view('backend.fileManager');
    }
}
