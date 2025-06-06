<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestFormController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\TestSecurrityController;
use App\Http\Controllers\TestValidationController;


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

Route::get('/library_user/{id}', App\Http\Controllers\LibraryUserController::class)->where(['id' => '[0-1]+']);

Route::get('/my_user', [App\Http\Controllers\MyUserController::class, "showUser"]);
Route::get('/my_second_user', [App\Http\Controllers\MySecondUserController::class, "showUser"]);

Route::get('/redirect_test', App\Http\Controllers\TestRedirectController::class);

Route::get('send_file', App\Http\Controllers\SendFileController::class);

Route::get('/second_books_list', App\Http\Controllers\BooksController::class);

Route::get('/main', function(){
    return view('mainpage');
});

Route::get('/about', function(){
    return view('aboutpage');
});

Route::get('/users_list', function(){
    $users = ["Коля", "Вася", "Петя", "Дима", "Акакий", "Демиус", "Николас"];

   return view('users', ['users' => $users]);
});

Route::get('/test_dir', function(){
   return view('testdir');
});

Route::get('/test_request', [App\Http\Controllers\RequestTestController::class, "testRequest"]);

Route::get('/test_header', [App\Http\Controllers\TestHeaderController::class, "getHeader"]);

Route::get('/test_cookie', [App\Http\Controllers\TestCookieController::class, 'testCookie']);

Route::get('/upload_image', [App\Http\Controllers\ImageUploadController::class, 'showForm'])->name('showForm');
Route::post('/upload_image', [App\Http\Controllers\ImageUploadController::class, 'uploadImage'])->name('uploadImage');

Route::post('/json_parse', [App\Http\Controllers\JsonParseController::class, 'parseJson']);

Route::get('/form', [TestFormController::class, 'showForm'])->name('show_form');
Route::post('/form', [TestFormController::class, 'postForm'])->name('post_form');

Route::get('/worker', [WorkerController::class, 'create'])->name('create_worker');
Route::post('/worker', [WorkerController::class, 'store'])->name('store_worker');
Route::get('/worker/{id?}', [WorkerController::class, 'show'])->name('show_worker');

Route::post('/security_test', [TestSecurrityController::class, 'post'])->name('post_security_form');
Route::get('/security_test', [TestSecurrityController::class, 'show'])->name('show_security_form');

Route::get('/test_validation', [TestValidationController::class, 'show'])->name('show_validation_form');
Route::post('/test_validation', [TestValidationController::class, 'post'])->name('post_validation_form');

Route::get('/test_builder', [WorkerController::class, 'showForm'])->name('showForm_worker');
Route::post('/test_builder', [WorkerController::class, 'store'])->name('formBuilder_store_worker');
