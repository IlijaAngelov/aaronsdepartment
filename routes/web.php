<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
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

Route::get('file_import_export', [ImportController::class, 'fileImportExport']);
Route::post('file_import', [ImportController::class, 'fileImport'])->name('file_import');

Route::get('/viewTable', [ImportController::class, 'index'])->name('view_table');
Route::get('/viewEmployee', [ImportController::class, 'view'])->name('view_employee');
Route::post('/viewEmployee', [ImportController::class, 'view'])->name('view_employee');

Route::get('/viewTotal', [ImportController::class, 'total'])->name('view_total');
Route::post('/viewTotal', [ImportController::class, 'filterTotal'])->name('view_total');

Route::resource('/shift', ShiftController::class);

