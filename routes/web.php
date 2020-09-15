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

Route::get('/test', function () {
    return "This is new page";
});

Route::get('/dbconnection', function () {
    // return view('welcome');
    if(DB::connection()->getDatabaseName())
   {
    return "conncted sucessfully to database ".DB::connection()->getDatabaseName();
   }else{
       return "unable to connect";
   }

});



Route::group(['middleware' => 'authenticated'], function(){
    Route::get('/employee', 'PagesController@employees')->name('employee');
    Route::get('/profile', 'ProfileController@profile')->name('profile');
    Route::get('/electric', 'PagesController@electric')->name('electric');
    Route::get('/location', 'PagesController@location')->name('location');
    Route::get('/consumption/{year1}/{year2}', 'ConsumptionController@consumption')->name('consumption');
});

// Route::get('/login', function() {
//     return view('auth.login');
// });
// Route::post('/login', 'LoginController@authenticate')->name('Login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/currentuser', function() {
    return Auth::user();
});
