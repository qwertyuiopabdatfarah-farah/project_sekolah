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
    Route::get('/news/id',        'NewsController@indexId')->name('news.index.id');
    Route::get('/news/id/get',    'NewsController@getDataid')->name('news.get.id');
    Route::get('/news',           'NewsController@indexAll')->name('news.index.all');
    Route::get('/news/create',    'NewsController@create')->name('news.create');
    Route::post('/news',          'NewsController@store')->name('news.store');
    Route::get('/news/{id}',      'NewsController@show')->name('news.show');
    Route::get('/news/{id}/edit', 'NewsController@edit')->name('news.edit');
    Route::patch('/news/{id}',    'NewsController@update')->name('news.update');
    Route::delete('/news/{id}',   'NewsController@destroy')->name('news.destroy');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/{provider}', 'SocialAuthController@redirectToProvider')
       ->name('login.redirect');
Route::get('/login/{provider}/callback', 'SocialAuthController@handleProviderCallback')
      ->name('login.handle');
