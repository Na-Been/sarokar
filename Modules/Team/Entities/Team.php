<?php

namespace Modules\Team\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','designation','image'
    ];

    protected static function newFactory()
    {
        return \Modules\OurTeam\Database\factories\TeamFactory::new();
    }
}
