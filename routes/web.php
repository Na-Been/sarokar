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

//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
Route::view('category/view','frontend.newsCategory');
Route::view('category/details','frontend.newsDetail');
Route::get('sub-category/{slug}','Frontend\NewsController@findSubCategory')->name('sub.category.details');

Route::group(['middleware' => ['web', 'auth', 'verified'], 'prefix' => 'backend'], function () {

    Route::get('/profile', 'Backend\ProfileController@profile')->name('profile');
    Route::put('/profile', 'Backend\ProfileController@profileUpdate')->name('profile.update');
    Route::get('/dashboard', 'Backend\HomeController@index')->name('dashboard');

    Route::resource('/advertisement', 'Backend\AdvertisementController');
    Route::get('/advertisement/changeStatus/{id}', 'Backend\AdvertisementController@changeStatus');

    Route::get('media','Backend\VideoController@media')->name('media.index');
    Route::resource('/video', 'Backend\VideoController');
    Route::get('/video/changeStatus/{id}', 'Backend\VideoController@changeStatus');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});

require __DIR__.'/auth.php';



Route::get('/','Frontend\HomeController@index');
Route::get('/category/{slug}','Frontend\NewsController@findCat')->name('category-slug');
Route::get('/sub-category/{slug}','Frontend\NewsController@findSubCat')->name('sub.category-slug');
Route::get('/news/detail/{slug}','Frontend\NewsController@newsDetail')->name('news-detail');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('all/videos','Frontend\NewsController@displayAllVideos')->name('display.all.videos');

Route::view('file','file-manager');


