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


Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('blog/{slug}','BlogController@getSingle')->where('slug', '[\w\d\-\_]+')->name('blog.single');

Route::post('comments/{post_id}','CommentsController@store')->name('comments.store');
Route::get('comments/{id}/edit','CommentsController@edit')->name('comments.edit');
Route::put('comments/{id}','CommentsController@update')->name('comments.update');
Route::delete('comments/{id}','CommentsController@destroy')->name('comments.destroy');

Route::get('blog','BlogController@getIndex')->name('blog.index');
Route::get('/','pagesController@getIndex');
Route::get('/about','pagesController@getAbout');
Route::get('/contact','pagesController@getContact');
Route::post('/contact','pagesController@postContact');
Route::resource('posts','PostController');
Route::resource('categories','CategoryController');
Route::resource('tags','TagController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
