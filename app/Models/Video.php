<?php

namespace App\Models;

use Cohensive\Embed\Facades\Embed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'videos';

    protected $fillable = [
        'title',
        'image',
        'url',
        'status'
    ];

    public function getVideoHtmlAttribute()
    {
        $embed = Embed::make($this->url)->parseUrl();

        if (!$embed)
            return '';

        $embed->setAttribute(['width' => 300]);
        return $embed->getHtml();
    }
}
