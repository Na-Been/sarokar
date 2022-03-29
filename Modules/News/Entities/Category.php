<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'order',
        'highlight_news_id'
    ];

    protected static function newFactory()
    {
        return \Modules\NewsCategory\Database\factories\NewsCategoryFactory::new();
    }

    public function subCategories()
    {
        return $this->hasMany(NewsSubCategory::class);
    }

    public function getSubCategories($id)
    {
        return NewsSubCategory::where('category_id', $id)->get();
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
