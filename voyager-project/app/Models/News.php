<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class News extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'hidden'
    ];
}
