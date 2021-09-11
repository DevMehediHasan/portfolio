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

Route::get('/', 'Frontend\IndexController@Index' )->name('index');
Route::post('contacts', ['as'=>'contacts.store','uses'=>'ContactController@store']);
Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function (){
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::resource('recent-work', 'RecentWorkController');
    Route::resource('category', 'CategoryController');
    Route::resource('contact', 'ContactController');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
