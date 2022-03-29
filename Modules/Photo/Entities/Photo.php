<?php

namespace Modules\Photo\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'image', 'status'
    ];

    protected static function newFactory()
    {
        return \Modules\Photo\Database\factories\PhotoFactory::new();
    }
}
