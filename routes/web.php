<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\Violate_listController;
use App\Http\Controllers\Comment_listController;
use App\Http\Controllers\UsereditController;
use App\Http\Controllers\UserdeleteController;


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
Route::get('/mypage', [MyPageController::class, 'index'])->name('mypage');
Route::post('/mypage', [MyPageController::class, 'index']);
Route::get('/posts/{post}/violate', [Violate_listController::class, 'violatelist'])->name('posts.violate');
Route::post('/posts/{post}/violate', [Violate_listController::class, 'violate']);
Route::get('/posts/storecomment',[Comment_listController::class, 'storecomment'])->name('posts.storecomment');
Route::post('/posts/storecomment',[Comment_listController::class, 'storecomment']);
Route::get('/useredit',[UsereditController::class, 'UserEdit'])->name('useredit');
Route::post('/useredit',[UsereditController::class, 'UserEdit']);
Route::patch('/useredit/{id}',[UsereditController::class, 'UserUpdate'])->name('userupdate');

Route::get('/userdelete',[UserdeleteController::class, 'UserDelete'])->name('userdelete');
Route::post('/userdelete',[UserdeleteController::class, 'UserDelete']);

