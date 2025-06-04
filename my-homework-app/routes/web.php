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

Route::get('/employeeForm', [App\Http\Controllers\EmployeeController::class, 'showEmployeeForm']);
Route::post('storeEmployee', [App\Http\Controllers\EmployeeController::class, 'store']);
Route::get('/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'update']);
Route::put('/employee/{id}/edit', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employeeEdit');

Route::get('/employees.show', function(){
    return view('showEmployee', [$employee = 'employee']);
})->name('employees.show');
