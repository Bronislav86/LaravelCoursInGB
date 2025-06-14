<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public $timestamps = false;
    protected $table = 'logs';

    protected $fillable = [
        'time',
        'duration',
        'ip',
        'url',
        'method',
        'input'
    ];

    protected $casts = [
        'duration' => 'decimal',
    ];
}
