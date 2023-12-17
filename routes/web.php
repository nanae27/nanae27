<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\Violate_listController;

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
    return view('home');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts/search', [HomeController::class, 'indexSearch'])->name('posts.search');
Route::resource('/posts', 'PostsController');
Route::get('/posts/mypage', [MypageController::class, 'index'])->name('posts.mypage');
Route::post('/posts/mypage', [MypageController::class, 'index']);
// Route::post('/posts/comment/store','ReportController@store')->name('comment.store');
Route::get('/posts/{post}/violate', [Violate_listController::class, 'violatelist'])->name('posts.violate');
Route::post('/posts/{post}/violate', [Violate_listController::class, 'violate']);
Route::get('/posts/comment',[CommentController::class, 'store'])->name('posts.comment');
Route::post('/posts/comment',[CommentController::class, 'poststore']);
