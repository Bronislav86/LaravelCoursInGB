<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    public $fillable = ['first_name', 'last_name', 'department'];
//     public $casts = 'department';
}
