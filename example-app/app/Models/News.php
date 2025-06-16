<?php

namespace App\Models;

use Illuminate\Bus\UpdatedBatchJobCounts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $connection = 'mysql';
    protected $database = 'skillbox';
    public $timestamps = true;

    protected $fillable = ['title', 'slug', 'body'];

    protected static function boot()
    {
        parent::boot();

        // static::updating(function (News $news) {
        //     Log::info('Updating News ' . $news);
        // });
    }
}
