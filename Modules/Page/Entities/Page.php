<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'title',
        'slug',
        'description',
        'status',
        'user_id',
        'order'
    ];

    protected static function newFactory()
    {
        return \Modules\Page\Database\factories\PageFactory::new();
    }
}
