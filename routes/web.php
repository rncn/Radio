<?php

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

Route::get('/', 'PagesController@index')->name('index');

Auth::routes();

//脱っ種ボード
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/~about', function () {
    return view('about');
});
//投稿フォームページ
Route::get('/post', 'PostController@showCreateForm')->name('posts.create');
Route::post('/post', 'PostController@create');

//投稿確認ページ
Route::get('/post/{post}', 'PostController@detail')->name('posts.detail');

//ユーザープロフィール
Route::get('/u/{user}', 'UserController@detail')->name('users.detail');