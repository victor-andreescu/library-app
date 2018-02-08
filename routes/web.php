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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/authors', 'AuthorController@index')->name('author.index');
Route::get('/author/create', 'AuthorController@create')->name('author.create');
Route::post('/author', 'AuthorController@store')->name('author.store');
Route::get('/author/edit/{author}', 'AuthorController@edit')->name('author.edit');
Route::patch('/author/{author}', 'AuthorController@update')->name('author.update');
Route::delete('/author/{author}', 'AuthorController@destroy')->name('author.delete');


Route::get('/books', 'BookController@index')->name('book.index');
Route::get('/book/create', 'BookController@create')->name('book.create');
Route::post('/book', 'BookController@store')->name('book.store');
Route::get('/book/edit/{book}', 'BookController@edit')->name('book.edit');
Route::patch('/book/{book}', 'BookController@update')->name('book.update');
Route::delete('/book/{book}', 'BookController@destroy')->name('book.delete');


Route::get('/tags', 'TagController@index')->name('tag.index');
Route::get('/tag/create', 'TagController@create')->name('tag.create');
Route::post('/tag', 'TagController@store')->name('tag.store');
Route::get('/tag/edit/{tag}', 'TagController@edit')->name('tag.edit');
Route::patch('/tag/{tag}', 'TagController@update')->name('tag.update');
Route::delete('/tag/{tag}', 'TagController@destroy')->name('tag.delete');;



// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware' => ['auth']], function() {

});
