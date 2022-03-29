<?php


namespace App\Repo;


use App\Models\Advertisement;

class AdvertisementRepo
{
    /**
     * @var Advertisement
     */
    private $advertisement;

    /**
     * AdvertisementRepo constructor.
     */
    public function __construct(Advertisement $advertisement)
    {
        $this->advertisement = $advertisement;
    }

    public function getAll()
    {
        $ads = $this->advertisement->orderBy('id', 'DESC')->get();
        return $ads;
    }

    public function findById($id)
    {
        $value = $this->advertisement->find($id);
        return $value;
    }


    public function getCount()
    {
        $data = $this->advertisement->count();
        return $data;
    }

    public function getAdsForHomePage()
    {
        return $this->advertisement->where(['page' => 1, 'status' => 1])->get();
    }

}
