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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function (Request $request) {
        $timeline = FeedManager::getNewsFeeds(auth()->id())['timeline'];
        $activities = collect($timeline->getActivities(0,15)['results']);
        $activities->transform(function($activity){
            return [
                'user' => App\User::stream($activity['actor']),
                'dweet' => App\Dweet::stream($activity['foreign_id'])
            ];
        });
        JavaScript::put(['activities' => $activities]);
        return view('index', ['dweet' => auth()->user()->dweet]);
    });

    Route::post('/dweet', function () {
        \App\Dweet::create(['user_id' => auth()->user()->id, 'text' => request()->text]);
        return redirect('/');
    });

    Route::get('profile', function () {
        return view('profile');
    })->name('profile');

    Route::put('profile', function (){
        auth()->user()->update([
            'name' => request()->name,
            'email' => request()->email,
            'password' => bcrypt(request()->password),
            'username' => request()->username
        ]);
        return redirect()->to('/profile');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
