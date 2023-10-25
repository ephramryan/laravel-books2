<?php

use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about-us', [AboutController::class,'about'])->name('about');

Route::get('/api/test/array', [TestController::class, 'arrayResponse'])->name('array.response');
Route::get('/api/test/model', [TestController::class, 'modelResponse'])->name('model.response');
Route::get('/api/test/collection', [TestController::class, 'collectionResponse'])->name('collection.response');

Route::get('/home', [HomeController::class,'home'])->middleware('auth')->name('home');

Route::get('/book/{book_id}', [BookController::class, 'show'])->name('book.show');

// auth-protected routes
Route::middleware(['auth'])->group(function() {

    Route::post('/book/{book_id}/review', [ReviewController::class, 'reviewBook'])->name('book.review');

});

// all admin routes
Route::group([
    'middleware' => 'can:admin'  // * settings of the group
], function() {

    // any routes defined in here will automatically get the settings (*) from the group

    Route::get('/admin/books', [BookController::class, 'index']);

    Route::get('/admin/users', [UserController::class, 'index']);

});


Route::get('/force-login/{user_id}', function($user_id) {
    $user = User::findOrFail($user_id);
    Auth::login($user);