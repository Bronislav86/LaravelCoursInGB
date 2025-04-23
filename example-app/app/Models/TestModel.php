<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use HasFactory;
    protected $table = 'test';
    protected $connection = 'second_mysql';
    protected $primaryKey = 'test_id';
    public $incrementing = true;
    public $timestamps = true
    protected $attributes = ['test_attribute_1', 'test_attribute_2', 'test_attribute_3'];
}
