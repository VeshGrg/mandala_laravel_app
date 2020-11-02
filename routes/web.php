<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get("/",'HomeController@index')->name('home');
Route::resource('articles','ArticleController');
Route::resource('categories','CategoryController')->except(['show']);
Route::resource('comments','CommentController')->only(['store']);
Route::resource('users','UserController')->except(['show']);

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('my-profile', 'ProfileController@index')->name('profile');
Route::post('my-profile', 'ProfileController@updateMainDetails')->name('profile');
Route::patch('my-profile', 'ProfileController@updateProfileDetails')->name('profile');
Route::post('change-password', 'ProfileController@changePassword')->name('change.password');


// Route::get("contact",'PageController@contact');
// Route::post("contact",'PageController@storeContact');
// Route::get("about",'PageController@about');
// Route::get('clear-my-name', 'PageController@clearName');
// Route::put('contact',function (){
//    echo 'put or replace';
// });







