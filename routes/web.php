<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PostsCommentController;
use App\Http\Controllers\Dashboard\PostsController;
use Illuminate\Support\Facades\Route;

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
    return view('frontend.pages.index');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'dashboard',

], function () {

    Route::resource('/', DashboardController::class)->names('dashboard');
    Route::resource('/posts', PostsController::class)->names('dashboard.posts');
    Route::resource('/posts/{post}/comments', PostsCommentController::class)->names('dashboard.posts.comments');
});


require __DIR__ . '/auth.php';
