<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_id', 'category_id', 'sub_category_id'
    ];

    protected static function newFactory()
    {
        return \Modules\NewsCategory\Database\factories\NewsCategoryFactory::new();
    }


    public function getSubCategories($id)
    {
        return NewsSubCategory::where('category_id', $id)->get();
    }

    public function news()
    {
        return $this->belongsTo(News::class)->latest();
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->latest();

    }

    public function subCategory()
    {
        return $this->belongsTo(NewsSubCategory::class)->latest();

    }
}
