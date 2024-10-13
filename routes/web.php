<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Jobs\JobsController;
use App\Http\Controllers\Dashboard\posts\PostsCommentController;
use App\Http\Controllers\Dashboard\posts\PostsController;
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

Route::get('/blog', function () {
    return view('frontend.pages.blog');
});

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard',

], function () {

    Route::resource('/', DashboardController::class)->names('dashboard');
    Route::resource('/posts', PostsController::class)->names('dashboard.posts');
    Route::resource('/posts/{post}/comments', PostsCommentController::class)->names('dashboard.posts.comments');
    Route::resource('/jobs', JobsController::class)->names('dashboard.jobs');
});

Route::group(['middleware' => 'auth',], function () {

    Route::resource('/posts', \App\Http\Controllers\Frontend\PostsController::class)->names('home.posts');
    Route::resource('/Jobs', \App\Http\Controllers\Frontend\JobsController::class)->names('home.jobs');

    Route::post('jobs/{job}/apply', [\App\Http\Controllers\Frontend\JobsController::class, 'apply'])->name('job.apply');
    Route::post('applications/{application}/approve', [\App\Http\Controllers\Frontend\ApplicationController::class, 'approve']);
    Route::post('applications/{application}/decline', [\App\Http\Controllers\Frontend\ApplicationController::class, 'decline']);
});


require __DIR__ . '/auth.php';
