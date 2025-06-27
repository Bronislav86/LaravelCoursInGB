<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'name',
        'category_id' || 1,
    ];
    public $incrementing = true;
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
