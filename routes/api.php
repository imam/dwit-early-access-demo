<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('user', function (Request $request){
        return $request->user();
    });
    Route::get('getstream/token', function (Request $request){
        $feed = FeedManager::getNewsFeeds($request->user()->id)['timeline'];
        return $feed->getReadonlyToken();
    });
    Route::get('dweet', 'Api\DweetController@index');
    Route::post('dweet', 'Api\DweetController@store');
});
