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
// Route::group(function () {
//     Route::get('/', 'Newscontroller@index');
//     Route::get('/hello', 'NewsController@hello');
// });
// Route::get('/news', 'NewsController@index');
// Route::get('/news/{id}', 'NewsController@show');
Route::post('/upload', 'NewsController@upload');
// Route::post( '/hello/{id}', 'NewsController@show_id');
Route::get('/ajax_upload', 'AjaxUploadController@index');
Route::post('/ajax_upload/action', 'AjaxUploadController@action')->name('ajaxupload.action');