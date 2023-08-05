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

Route::get('/', 'UserController@map');

Route::resource('/report', 'TrafficController');
//Route::post('', 'RegisterController@first');


Route::get('/update', function () {
    return view('/update');
});


Auth::routes();

Route::get('/settings', 'UserController@settings');
Route::post('/adminBan/{id}', 'UserController@updateSuspensao');
Route::post('/adminErase/{id}', 'UserController@updateEliminar');

Route::post('/updateAdmin/{id}', 'HomeController@updateAdmin');

Route::resource('/perfil', 'HomeController');
Route::get('/userAdmin', 'UserController@index');
Route::get('/reportAdmin', 'ReportController@index');
Route::post('/searchReports', 'ReportController@search');

Route::post('/searchUser', 'UserController@search');
Route::get('/{user}', 'UserController@show');

Route::post('/settingss', 'UserController@updatephoto');

Route::post('/eliminar/{id}', 'HomeController@eliminarconta');
//Route::get('/perfil', 'HomeController@index');
//Route::delete('/delete/{user}','TrafficController@destroy');
