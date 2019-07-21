<?php

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

//User Pages Routes
Route::get('/', 'PagesController@index')->name('home');
Route::get('about', 'PagesController@about')->name('about');
Route::get('contact', 'PagesController@contact')->name('contact');
Route::get('privacy-policy', 'PagesController@privacyPolicy')->name('privacy-policy');
Route::get('terms-of-service', 'PagesController@terms')->name('terms');
Route::get('author/{user}', 'PagesController@author')->name('author');
Route::get('category/{name}', 'PagesController@category')->name('category');
Route::get('tag/{name}', 'PagesController@tag')->name('tag');
Route::get('search', 'PagesController@result')->name('result');

//Admin Auth Routes
Route::get('admin/login', 'Auth\HackersLoginController@showLogin')->name('admin.login');
Route::post('admin/login', 'Auth\HackersLoginController@login')->name('admin.login.submit');
Route::get('admin/logout', 'Auth\HackersLoginController@logout')->name('admin.logout');

//Categories Management Routes
Route::resource('admin/categories', 'CategoryController', ['except' => ['create','destroy']]);

//Tags Management Routes
Route::resource('admin/tags', 'TagController', ['except' => ['create']]);

//Admins Management Routes
Route::resource('admin/admins', 'AdminController');
Route::get('admin/password', 'AdminController@password')->name('admins.password');
Route::post('admin/password', 'AdminController@passwordUpdate')->name('password.update');

//Messages Route
Route::get('admin/messages', 'HackersController@messages')->name('messages.index');
Route::post('messages', 'MessagesController@store')->name('messages.store');
Route::delete('messages/{id}', 'MessagesController@destroy')->name('messages.destroy');

//Statistics Route
Route::get('admin/statistics', 'HackersController@statistics')->name('statistics.index');

//Comments Route
Route::post('comments/{post_id}', 'CommentsController@store')->name('comments.store');
Route::delete('comments/{id}', 'CommentsController@destroy')->name('comments.destroy');

//Admin Pages Routes
Route::resource('admin', 'HackersController');

//User Display Post Route(Do not move this) 
Route::get('{urltext}', 'PagesController@post')->name('post');