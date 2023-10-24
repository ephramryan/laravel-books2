<?php

use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/about-us', [AboutController::class,'about'])->name('about');

Route::get('/api/test/array', [TestController::class, 'arrayResponse'])->name('array.response');
Route::get('/api/test/model', [TestController::class, 'modelResponse'])->name('model.response');
Route::get('/api/test/collection', [TestController::class, 'collectionResponse'])->name('collection.response');

