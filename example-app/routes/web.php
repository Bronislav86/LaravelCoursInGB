<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/test', App\Http\Controllers\TestController::class);

Route::get('/users', [App\Http\Controllers\UserController::class, "showUsers"]);

Route::get('/user', [App\Http\Controllers\UserController::class, "index"]);
Route::post('/user', [App\Http\Controllers\UserController::class, "store"])->name('store-user');

Route::get('/someusers', [App\Http\Controllers\UserController::class, "showUsers"]);

Route::get('/simpletest', [App\Http\Controllers\SimpleController::class, "test"]);

Route::get('/books', [App\Http\Controllers\EntityController::class, "index"])->name('books');
Route::post('/books', [App\Http\Controllers\EntityController::class, "store"])->name('save_book');
Route::get('/remove_books/{id}', [App\Http\Controllers\EntityController::class, "delete"])->
where(['id' => '[0-9]+'])->name('remove_book');

Route::get('/upload', [App\Http\Controllers\FileUploadController::class, "index"]);
Route::post('/upload', [App\Http\Controllers\FileUploadController::class, "upload"])->name('upload_file');
