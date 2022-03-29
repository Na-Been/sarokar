<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repo\AdvertisementRepo;
use App\Repo\BlogCategoryRepo;
use App\Repo\BlogRepo;
use App\Repo\NewsCategoryRepo;
use App\Repo\NewsRepo;
use App\Repo\VideoRepo;
use Modules\News\Entities\NewsSubCategory;
use Modules\Page\Entities\Page;
use Modules\Team\Entities\Team;

class HomeController extends Controller
{
    /**
     * @var NewsCategoryRepo
     */
    private $newsCategoryRepo;
    /**
     * @var NewsRepo
     */
    private $newsRepo;
    /**
     * @var BlogRepo
     */
    private $blogRepo;
    /**
     * @var BlogCategoryRepo
     */
    private $blogCategoryRepo;
    /**
     * @var AdvertisementRepo
     */
    private $advertisementRepo;
    /**
     * @var VideoRepo
     */
    private $videoRepo;

    /**
     * HomeController constructor.
     * @param NewsCategoryRepo $newsCategoryRepo
     * @param NewsRepo $newsRepo
     * @param BlogRepo $blogRepo
     * @param AdvertisementRepo $advertisementRepo
     * @param VideoRepo $videoRepo
     * @param BlogCategoryRepo $blogCategoryRepo
     */
    public function __construct(
        NewsCategoryRepo $newsCategoryRepo,
        NewsRepo $newsRepo,
        BlogRepo $blogRepo,
        AdvertisementRepo $advertisementRepo,
        VideoRepo $videoRepo,
        BlogCategoryRepo $blogCategoryRepo)
    {
        $this->newsCategoryRepo = $newsCategoryRepo;
        $this->newsRepo = $newsRepo;
        $this->blogRepo = $blogRepo;
        $this->blogCategoryRepo = $blogCategoryRepo;
        $this->advertisementRepo = $advertisementRepo;
        $this->videoRepo = $videoRepo;
    }

    public function index()
    {
        $newsCatCount = $this->newsCategoryRepo->getCount();
        $newsSubCat = NewsSubCategory::count();
        $newsCount = $this->newsRepo->getCount();
        $teamMember = Team::count();
        $videoCount = $this->videoRepo->getCount();
        $adCount = $this->advertisementRepo->getCount();
        $pages = Page::count();
        $users = User::count();
        return view('backend.dashboard', compact('newsCatCount', 'newsCount', 'newsSubCat',
            'teamMember', 'videoCount', 'adCount','pages','users'));
    }
}
