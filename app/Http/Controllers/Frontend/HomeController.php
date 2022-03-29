<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repo\AdvertisementRepo;
use App\Repo\NewsCategoryRepo;
use App\Repo\NewsRepo;

class HomeController extends Controller
{
    /**
     * @var AdvertisementRepo
     */
    private $advertisementRepo;
    /**
     * @var NewsRepo
     */
    private $newsRepo;
    /**
     * @var NewsCategoryRepo
     */
    private $newsCategoryRepo;

    /**
     * HomeController constructor.
     * @param AdvertisementRepo $advertisementRepo
     * @param NewsRepo $newsRepo
     * @param NewsCategoryRepo $newsCategoryRepo
     */
    public function __construct(

        AdvertisementRepo $advertisementRepo,
        NewsRepo $newsRepo,
        NewsCategoryRepo $newsCategoryRepo
    )
    {
        $this->advertisementRepo = $advertisementRepo;
        $this->newsRepo = $newsRepo;
        $this->newsCategoryRepo = $newsCategoryRepo;
    }

    public function index()
    {
        $ads = $this->advertisementRepo->getAdsForHomePage();
        $news = $this->newsRepo->getActiveNews();
        $newsCats = $this->newsCategoryRepo->getAll();
        return view('frontend.home', compact('ads', 'news', 'newsCats'));
    }

}
