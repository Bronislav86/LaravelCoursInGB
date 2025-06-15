<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\News;
use App\Events\NewsHidden;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PdfGeneratorController;


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

Route::get('/test_database', function () {
    $employee = new Employee();
    $saved = $employee->save();
});

Route::get('/employeeForm', [App\Http\Controllers\EmployeeController::class, 'showEmployeeForm']);
Route::post('storeEmployee', [App\Http\Controllers\EmployeeController::class, 'store']);
Route::get('/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'update']);
Route::put('/employee/{id}/edit', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employeeEdit');

Route::get('/employees.show', function () {
    return view('showEmployee', [$employee = 'employee']);
})->name('employees.show');

Route::get('/index', [BookController::class, 'index'])->name('index_book');
Route::post('/index', [BookController::class, 'store'])->name('store_book');

Route::get('/clients', [ClientController::class, 'index'])->name('show_clients');
Route::get('/clients/{id?}', [ClientController::class, 'get'])->name('get_client');
Route::get('/clients_form', [ClientController::class, 'create'])->name('create_client');
Route::post('/clients_form', [ClientController::class, 'store'])->name('store_client');
Route::get('/resume/{id}', [PdfGeneratorController::class, 'index'])->name('resume');

Route::get('/logs', function () {
    return view('logs');
});

Route::get('/news/create-test', function () {
    $news = new News();

    $news->title = 'Test2 news title';
    $news->body = 'Test2 news body';

    $news->save();
    return $news;
});
Route::get('/news/{id}/hide', function ($id) {
    $news = News::findOrFail($id);
    $news->hidden = true;
    $news->save();
    NewsHidden::dispatch($news);

    return 'News hidden';
});
