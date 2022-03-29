<?php


use Illuminate\Support\Collection;
use Modules\News\Entities\Category;
use Modules\News\Entities\News;
use Modules\News\Entities\NewsCategory;


function displayNewsByCategory($category_id)
{
    $perPage = request('per_page');
    if ($perPage) {
        return NewsCategory::where('category_id', $category_id)->with(['news', 'category'])->paginate($perPage)->sortByDesc('news.created_at');
    } else {
        return NewsCategory::where('category_id', $category_id)->with(['news', 'category'])->paginate(10)->sortByDesc('news.created_at');
    }

}

function displayFlashNews()
{
    return News::where('flash_news', 1)->latest()->get();
}

function displayFirstCategoryData(): Collection
{
    $thirdCategory = Category::where('order', 1)->first();
    return $thirdCategory ? displayNewsByCategory($thirdCategory->id) : collect();
}

function displaySecondCategoryData(): Collection
{
    $secondCategory = Category::where('order', 2)->first();
    return $secondCategory ? displayNewsByCategory($secondCategory->id) : collect();
}

function displayThirdCategoryData(): Collection
{
    $thirdCategory = Category::where('order', 3)->first();
    return $thirdCategory ? displayNewsByCategory($thirdCategory->id) : collect();
}

function displayFourthCategoryData(): Collection
{
    $fourthCategory = Category::where('order', 4)->first();
    return $fourthCategory ? displayNewsByCategory($fourthCategory->id) : collect();
}

function displayFifthCategoryData(): Collection
{
    $fifthCategory = Category::where('order', 5)->first();
    return $fifthCategory ? displayNewsByCategory($fifthCategory->id) : collect();
}

function displaySixthCategoryData(): Collection
{
    $sixth = Category::where('order', 6)->first();
    return $sixth ? displayNewsByCategory($sixth->id) : collect();
}

function displaySeventhCategoryData(): Collection
{
    $seventh = Category::where('order', 7)->first();
    return $seventh ? displayNewsByCategory($seventh->id) : collect();
}

function displayEighthCategoryData(): Collection
{
    $eighth = Category::where('order', 8)->first();
    return $eighth ? displayNewsByCategory($eighth->id) : collect();
}

function displayNinthCategoryData(): Collection
{
    $ninth = Category::where('order', 9)->first();
    return $ninth ? displayNewsByCategory($ninth->id) : collect();
}

function displayTenthCategoryData(): Collection
{
    $ninth = Category::where('order', 10)->first();
    return $ninth ? displayNewsByCategory($ninth->id) : collect();
}

function displayEleventhCategory(): Collection
{
    $ninth = Category::where('order', 11)->first();
    return $ninth ? displayNewsByCategory($ninth->id) : collect();
}

function displayTwelfthCategory(): Collection
{
    $ninth = Category::where('order', 12)->first();
    return $ninth ? displayNewsByCategory($ninth->id) : collect();
}

function displayThirteenCategory(): Collection
{
    $ninth = Category::where('order', 13)->first();
    return $ninth ? displayNewsByCategory($ninth->id) : collect();
}

function displayFourteenCategory(): Collection
{
    $ninth = Category::where('order', 14)->first();
    return $ninth ? displayNewsByCategory($ninth->id) : collect();
}

function displayFifteenCategory(): Collection
{
    $ninth = Category::where('order', 15)->first();
    return $ninth ? displayNewsByCategory($ninth->id) : collect();
}
