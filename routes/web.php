<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\Violate_listController;
use App\Http\Controllers\Comment_listController;
use App\Http\Controllers\UsereditController;
use App\Http\Controllers\UserdeleteController;
use App\Http\Controllers\OwnerpageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;


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




Auth::routes();    
Route::group(['middleware' => 'auth'], function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/posts/search', [HomeController::class, 'indexSearch'])->name('posts.search');
Route::resource('/posts', 'PostsController');
Route::get('/mypage', [MyPageController::class, 'index'])->name('mypage');
Route::post('/mypage', [MyPageController::class, 'index']);
Route::get('/violate/{postId}', [Violate_listController::class, 'create'])->name('violations.create');
Route::post('/violate/{postId}', [Violate_listController::class, 'store'])->name('violations.store');
Route::get('/storecomment',[Comment_listController::class, 'storecomment'])->name('posts.storecomment');
Route::post('/storecomment',[Comment_listController::class, 'storecomment']);
Route::get('/useredit',[UsereditController::class, 'UserEdit'])->name('useredit');
Route::patch('/useredit/{id}',[UsereditController::class, 'UserUpdate'])->name('userupdate');
Route::delete('/userdelete/{id}',[UserdeleteController::class, 'UserDelete'])->name('userdelete');
Route::get('/userdelete/{id}',[UserdeleteController::class, 'UserDeleteform'])->name('userdelete');
// 無限スクロール
Route::post('ajax/scroll', 'PostsController@ajaxscroll')->name('posts.ajaxscroll');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




Route::get('/ownerpage', [OwnerpageController::class, 'index'])->name('ownerpage');
Route::post('/ownerpage', [OwnerpageController::class, 'index']);
Route::get('/postlist', [OwnerpageController::class, 'postList'])->name('postlist');
Route::post('/postlist', [OwnerpageController::class, 'postList']);
Route::get('/userlist', [OwnerpageController::class, 'userList'])->name('userlist');
Route::post('/userlist', [OwnerpageController::class, 'userList']);
Route::get('/posthidden', [OwnerpageController::class, 'posthidden'])->name('posthidden');
Route::post('/posthidden', [OwnerpageController::class, 'posthidden']);
Route::get('/showuserlist', [OwnerpageController::class, 'showuserlist'])->name('showuserlist');
Route::post('/showuserlist', [OwnerpageController::class, 'showuserlist']);

});







   
