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

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'backend'], function () {
    Route::resource('news-category', 'NewsCategoryController');
    Route::resource('news-sub-category', 'NewsSubCategoryController');
    Route::get('news/sub/category/{id}', 'NewsController@getNewsSubCategory')->name('get.news.sub.category');
    Route::resource('news', 'NewsController');
    Route::get('news/changeStatus/{id}', 'NewsController@changeStatus');

});
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
