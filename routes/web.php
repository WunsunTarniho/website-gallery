<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [PostController::class, 'index']);
    Route::get('/profile/album/{id}', [AlbumController::class, 'album']);
    Route::get('/download/{image}', [PostController::class, 'download']);
    Route::get('/logout', [AuthenticateController::class, 'logout']);
    Route::resource('/post', PostController::class);
    Route::resource('/album', AlbumController::class);
    Route::resource('post.comment', CommentController::class);
    Route::resource('/like', LikeController::class);
});

Route::resource('/profile', UserController::class);
Route::resource('/user', UserController::class);
Route::get('/login', [AuthenticateController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticateController::class, 'login']);