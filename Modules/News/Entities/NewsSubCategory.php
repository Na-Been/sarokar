<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_category_name', 'category_id', 'user_id', 'slug'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\NewsSubCategory\Database\factories\NewsSubCategoryFactory::new();
//    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function news()
    {
        return $this->belongsToMany(News::class,'news','news_id','sub_category_id','id');
    }

}
