<?php


namespace App\Repo;


use App\Models\Video;

class VideoRepo
{
    /**
     * @var Video
     */
    private $video;

    /**
     * VideoRepo constructor.
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }


    public function getAll()
    {
        $ads = $this->video->orderBy('id','DESC')->get();
        return $ads;
    }

    public function findById($id)
    {
        $value = $this->video->find($id);
        return $value;
    }

    public function getCount()
    {
        $data = $this->video->count();
        return $data;
    }
}
