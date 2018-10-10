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

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::get('/news',       'NewsController@index')->name('news.index');
    Route::get('/news/create','NewsController@create')->name('news.create');
    Route::post('/news',      'NewsController@store')->name('news.store');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/{provider}', 'SocialAuthController@redirectToProvider')
       ->name('login.redirect');
Route::get('/login/{provider}/callback', 'SocialAuthController@handleProviderCallback')
      ->name('login.handle');
