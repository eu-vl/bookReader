<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//Routes for BookController
Route::resource('book', 'BookController');

//Routes for BookController
Route::resource('category', 'CategoryController');

//Route for Filtered Books by Category
Route::get('/book/category/{category_id}', 'bookCategoryController@getFilteredBooks')->name('book_category');

