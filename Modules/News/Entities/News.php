<?php

namespace Modules\News\Entities;

use App\Http\Controllers\Backend\BsdateController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;


class News extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'title',
        'slug',
        'highlight_text',
        'sub_heading',
        'feature_image',
        'author_image',
        'description',
        'posted_by',
        'status',
        'user_id',
        'image',
        'flash_news'
    ];
//    protected $casts = [
//        'created_at' => 'datetime:Y,m,d', // Change your format
//        'updated_at' => 'datetime:Y,m,d',
//    ];
//    2016,12,31

//    protected static function newFactory()
//    {
//        return \Modules\News\Database\factories\NewsFactory::new();
//    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'news_categories', 'category_id',
            'news_id', 'id');
    }

    public function subCategories()
    {
        return $this->belongsToMany(NewsSubCategory::class, 'news_categories', 'sub_category_id');
    }


    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function newsCategory()
    {
        return $this->hasMany(NewsCategory::class)->max('id');;
    }


    public function getNepaliCreatedAt()
    {
        $date = $this->created_at;
        $bsdate = new BsdateController();
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
        $a = get_nepali_date($date);
        $year = Carbon::parse($a)->format('Y');
        $month = Carbon::parse($a)->format('m');
        $date = Carbon::parse($a)->format('d');
        $nepMonth = $bsdate->_get_nepali_month($month);
        $nepDate = $bsdate->convert_to_nepali_number($date);
        $nepYear = $bsdate->convert_to_nepali_number($year);
        return $nepMonth . ' ' . $nepDate . ', ' . $nepYear;

    }

}
