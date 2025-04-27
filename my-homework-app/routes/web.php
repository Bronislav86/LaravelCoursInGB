<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/userform', [App\Http\Controllers\FormProcessor::class, 'index'])->name('form_processor');

Route::post('/store_form', [App\Http\Controllers\FormProcessor::class, 'store'])->name('store_form');

Route::get('/test_database', function(){
    $employee = new Employee();
    $saved = $employee->save();
});
