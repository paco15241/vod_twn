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


Route::get('/', function() {
    return redirect()->route('videos.index');
})->name('index');

Route::resource('videos', 'VideoController')->only([
    'index', 'show'
]);

Route::get('search', 'VideoController@search')->name('search');


// admin system
Route::get('admin/', function() {
    return redirect()->route('admin.videos.index');
})->name('admin.index');

Route::name('admin.')->prefix('admin')->group(function () {
    
    Route::resource('videos', 'Admin\VideoController')->except([
        'show'
    ]);

    Route::resource('platforms', 'Admin\PlatformController')->except([
        'index', 'show'
    ]);
});


// auth
Auth::routes([ 
    'register' => false,  // Registration Routes...
    'reset'    => false,  // Password Reset Routes...
    'verify'   => false,  // Email Verification Routes...
]);

// Route::get('/home', 'HomeController@index')->name('home');
