<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use HasFactory,SoftDeletes,InteractsWithMedia;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'image',
        'description',
        'status',
        'user_id',
    ];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\BlogFactory::new();
    }


    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }

}
