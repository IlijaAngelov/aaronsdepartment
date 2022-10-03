<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShiftController;

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
    return view('index');
});

// // change name of the route, edit index method to show the data
// Route::get('/view', [EmployeeController::class, 'index'])->name('view');

// // (relocate??) import the data from the csv file, use the import method then (return view??)
// Route::post('/import', [EmployeeController::class, 'import'])->name('import');


Route::get('file_import_export', [UserController::class, 'fileImportExport']);
Route::post('file_import', [UserController::class, 'fileImport'])->name('file_import');
Route::get('file_export', [UserController::class, 'fileExport'])->name('file_export');


Route::get('/viewTable', [UserController::class, 'index'])->name('view_table');
Route::get('/viewEmployee', [UserController::class, 'view'])->name('view_employee');
Route::post('/viewEmployee', [UserController::class, 'view'])->name('view_employee');

Route::get('/viewTotal', [UserController::class, 'total'])->name('view_total');
Route::post('/viewTotal', [UserController::class, 'filterTotal'])->name('view_total');

Route::resource('/shift', ShiftController::class);

