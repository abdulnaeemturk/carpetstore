<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Color\ColorController;

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



Route::resource('category',CategoryController::class);
Route::get('categorylistusingpagination/{perpage?}/{pagenumber?}/{fulltableorrecords?}',[CategoryController::class, 'fetchRecords']);


Route::resource('color',ColorController::class);
Route::get('colorlistusingpagination/{perpage?}/{pagenumber?}/{fulltableorrecords?}',[ColorController::class, 'fetchRecords']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
