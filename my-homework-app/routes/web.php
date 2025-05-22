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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/userform', [App\Http\Controllers\FormProcessor::class, 'index'])->name('form_processor');

Route::post('/store_form', [App\Http\Controllers\FormProcessor::class, 'store'])->name('store_form');

Route::get('/test_database', function(){
    $employee = new Employee();
    $saved = $employee->save();
});

Route::get('/', function () {
    $data = ['name' => 'Коля', 'age' => 17, 'position' => 'Старший логист', 'address' => 'Rostov'];

    return view('home', ['welcomeData' => $data]);
});

Route::get('/contacts', function(){
    $data2 = ['name' => 'Коля', 'address' => 'Rostov', 'post_code' => 810315, 'email' => '', 'phone' => '+79995551122'];

    return view('contacts', ['data' => $data2]);
});
