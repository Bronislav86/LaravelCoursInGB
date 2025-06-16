<?php

use App\Http\Controllers\TestDiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestFormController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\TestSecurrityController;
use App\Http\Controllers\TestValidationController;
use App\Models\News;
use App\Events\NewsCreated;
use App\Models\User;
use App\Notifications\UserEmailChangedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
    return redirect()->route('test.response');
    //view('welcome');
});

Route::get('/test', [\App\Http\Controllers\TestController::class]);

Route::get('/users', [\App\Http\Controllers\UserController::class, "showUsers"]);

Route::get('/user', [\App\Http\Controllers\UserController::class, "index"]);
Route::post('/user', [\App\Http\Controllers\UserController::class, "store"])->name('store-user');

Route::get('/someusers', [\App\Http\Controllers\UserController::class, "showUsers"]);

Route::get('/simpletest', [\App\Http\Controllers\SimpleController::class, "test"]);

Route::get('/books', [\App\Http\Controllers\EntityController::class, "index"])->name('books');
Route::post('/books', [\App\Http\Controllers\EntityController::class, "store"])->name('save_book');
Route::get('/remove_books/{id}', [\App\Http\Controllers\EntityController::class, "delete"])->where(['id' => '[0-9]+'])->name('remove_book');

Route::get('/upload', [\App\Http\Controllers\FileUploadController::class, "index"]);
Route::post('/upload', [\App\Http\Controllers\FileUploadController::class, "upload"])->name('upload_file');

Route::get('/library_user/{id}', \App\Http\Controllers\LibraryUserController::class)->where(['id' => '[0-1]+']);

Route::get('/my_user', [\App\Http\Controllers\MyUserController::class, "showUser"]);
Route::get('/my_second_user', [\App\Http\Controllers\MySecondUserController::class, "showUser"]);

Route::get('/redirect_test', \App\Http\Controllers\TestRedirectController::class);

Route::get('send_file', \App\Http\Controllers\SendFileController::class);

Route::get('/second_books_list', \App\Http\Controllers\BooksController::class);

Route::get('/main', function () {
    return view('mainpage');
});

Route::get('/about', function () {
    return view('aboutpage');
});

Route::get('/users_list', function () {
    $users = ["Коля", "Вася", "Петя", "Дима", "Акакий", "Демиус", "Николас"];

    return view('users', ['users' => $users]);
});

Route::get('/test_dir', function () {
    return view('testdir');
});

Route::get('/test_request', [\App\Http\Controllers\RequestTestController::class, "testRequest"]);

Route::get('/test_header', [\App\Http\Controllers\TestHeaderController::class, "getHeader"]);

Route::get('/test_cookie', [\App\Http\Controllers\TestCookieController::class, 'testCookie']);

Route::get('/upload_image', [\App\Http\Controllers\ImageUploadController::class, 'showForm'])->name('showForm');
Route::post('/upload_image', [\App\Http\Controllers\ImageUploadController::class, 'uploadImage'])->name('uploadImage');

Route::post('/json_parse', [\App\Http\Controllers\JsonParseController::class, 'parseJson']);

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

Route::get('/test_response', function () {
    // $response = new Response('Test content', 200);
    return response('New test url', 200)
        ->header('X-HEADER1', 'test')
        ->header('Content-Type', 'application/json');
})->name('test.response');

Route::get('/test_cookie', function () {
    return response('My first cookie', 200)
        ->cookie('My-test-cookie', 'test content', 5)
        ->withHeaders([
            'X-HEADER-TEST1' => 'IT WORKS',
            'X-HEADER-TEST2' => 'IT WORKS',
            'X-HEADER-TEST3' => 'IT WORKS'
        ])
        ->withoutCookie('My test cookie');
});

Route::get('/counter', function () {
    $counterValue = session('counter', 0);
    $counterValue++;
    session(['counter' => $counterValue]);
    return 'ok';
});

Route::get('/result_counter', function () {
    if (session()->has('counter')) {
        session()->forget('counter');
    }
    var_dump(session()->all());
});

Route::get('/list_of_books', function () {

    $listOfBooks = session()->get('list_of_books', '');

    return response()->json(['status' => 'received', 'list_of_books' => $listOfBooks ? unserialize($listOfBooks) : 'The List is Empty']);
});

Route::post('/list_of_books', function (Request $request) {
    $listOfBooks = session()->get('list_of_books', '');

    $listOfBooks = $listOfBooks ? unserialize($listOfBooks) : [];
    $listOfBooks[] = ['author' => $request->get('author'), 'title' => request()->get('title')];

    session()->put('list_of_books', serialize($listOfBooks));

    return response()->json(['status' => 'saved', 'list_of_books' => $listOfBooks]);
});

Route::delete('/list_of_books/{id?}', function ($id) {
    $listOfBooks = session()->get('list_of_books', '');

    $listOfBooks = $listOfBooks ? unserialize($listOfBooks) : null;

    if (array_key_exists($id, $listOfBooks)) {
        unset($listOfBooks[$id]);
    }

    session()->put('list_of_books', serialize($listOfBooks));

    return response()->json(['status' => 'deleted', 'list_of_books' => count($listOfBooks) > 0 ? $listOfBooks : 'The List is Empty']);
});

Route::get('/file_download', function () {
    return response()->download(base_path() . '/test.txt', 'my_test');
});
Route::get('file_show', function () {
    return response()->file(base_path() . '/test.txt');
});
Route::get('/file_stream_download', function () {
    return response()->streamDownload(function () {
        echo file_get_contents('https://google.com');
    }, 'google.html');
});

Route::get('/check_di', [TestDiController::class, 'showUrl']);
//Урок 9 - События
Route::get('/news', function () {
    NewsCreated::dispatch(News::first());
    return view('welcome');
});

Route::get('/news-update-test', function () {
    News::withoutEvents(function () {
        News::first()->update(['title' => 'Test 2']);
    });
    // News::first()->update(['title' => 'testTest']);
    return 'Updated';
});

Route::get('/news-update-test-observe', function () {
    // News::withoutEvents(function () {
    News::first()->update(['title' => 'New']);
    // });
    // News::first()->update(['title' => 'testTest']);
    return 'Updated';
});

// Урок 10 - Втроенные возможноности

Route::get('/sync-news', function () {
    \App\Jobs\SyncNews::dispatch(15);
    return response(['status' => 'success']);
});

Route::get('/locale', function () {
    echo Illuminate\Support\Facades\App::getLocale();
});

Route::get('/locale/set/{locale}', function ($locale) {

    App::setLocale($locale);

    echo App::getLocale();
    echo '<hr>';
    echo __('messages.greet');
});

Route::get('/locale/{locale}/thanks', function ($locale, \Illuminate\Http\Request $request) {
    App::setLocale($locale);

    echo __('messages.thanks', ['name' => $request->input('name')]);
});

Route::get('/user/create-test/{amount}', function ($amount) {
    return \App\Models\User::factory($amount)->create();
});

Route::get('/user/{user}/change-email', function (User $user, Request $request) {
    $oldEmail = $user->email;

    $user->email = $request->input('email');

    $user->save();

    $user->notify(new UserEmailChangedNotification($oldEmail));

    return response(['result' => 'E-mail changed']);
});

Route::get('/user/{user}/notifications', function (User $user) {
    return response($user->notifications);
});
