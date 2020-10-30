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

//Route::get('/', function () {
   // return view('welcome');
//});
Route::get("/",'PageController@show')->name('show');


//Route::get("contact",'PageController@contact');
//Route::post("contact",'PageController@storeContact');
//Route::get("about",'PageController@about');
//Route::get('clear-my-name', 'PageController@clearName');
//Route::put('contact',function (){
  //  echo 'put or replace';


//});

Route::get('user/{id?}/email/{email?}',function ($id=null , $email= null){
 echo 'user id is'. $id . 'and email is: '. $email;
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('articles','ArticleController');
Route::post('comments','CommentController@store')->name('comments.store');




