<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'checkAppKey'], function () {
    Route::get('/', 'ApiController@index');
    Route::get('news/category/{slug}', 'ApiController@newsCategoryDetails');
    Route::get('news/detail/{slug}', 'ApiController@newsDetail');
    Route::get('all/videos', 'ApiController@allVideosList');
    Route::get('all/setting', 'ApiController@allSettingList');
    Route::get('all/category', 'ApiController@allCategoryList');
});
