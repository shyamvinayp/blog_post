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

Route::get('/', function ($locale = 'en') {
   app()->setLocale($locale);
    session()->put('locale', $locale);
    return Redirect::to('login');
});

Route::get('/admin','AdminController@index');
Auth::routes();

Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
});

// forgot password
Route::get('/forget-password', 'ForgotPasswordController@getEmail');
Route::post('/forget-password', 'ForgotPasswordController@postEmail')->name('forget-password');

// reset password
Route::get('/reset-password/{token}', 'ResetPasswordController@getPassword');
Route::post('/reset-password', 'ResetPasswordController@updatePassword')->name('reset-password');;
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

//User routings
Route::get('users', 'UsersController@index')->name('users.index');
Route::get('/users/home', 'UsersController@home')->name('users.home');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::get('/users/profile', 'UsersController@profile')->name('users.profile');
Route::post('/users/store', 'UsersController@store')->name('users.store');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::post('/users/{user}/update', 'UsersController@update')->name('users.update');
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
Route::get('users/changeStatus/{connection}', 'UsersController@changeStatus')->name('users.changeStatus');
Route::get('/users/{user}/view', 'UsersController@view')->name('users.view');

//Post routings
Route::get('posts', 'Site\PostController@index')->name('site.post.index');
Route::get('post/{post}/show', 'Admin\PostController@show')->name('site.post.show');

Route::get('admin/posts', 'Admin\PostController@index')->name('admin.post.index');
Route::get('/admin/post/{post}/show', 'Admin\PostController@show')->name('admin.post.show');

Route::get('/admin/post/create', 'Admin\PostController@create')->name('admin.post.create');
Route::post('/admin/post/store', 'Admin\PostController@store')->name('admin.post.store');
Route::get('/admin/post/{post}/edit', 'Admin\PostController@edit')->name('admin.post.edit');
Route::post('/admin/post/{post}/update', 'Admin\PostController@update')->name('admin.post.update');
Route::delete('/admin/post/{user}', 'Admin\PostController@destroy')->name('admin.post.destroy');


