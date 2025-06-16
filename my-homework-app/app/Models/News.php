<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $connection = 'mysql';
    protected $database = 'homework_database';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['title', 'slug', 'body', 'hidden'];
    protected $casts = [
        'hidden' => 'boolean',
    ];
}
