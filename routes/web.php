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
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test')->name('test');

Route::group(['prefix'=>'mosque_committee'],function(){
    Route::get('/list',['as'=>'mosque_committee/list','uses'=>'MosqueCommitteeController@index']);
    Route::get('/add',['as'=>'mosque_committee/add','uses'=>'MosqueCommitteeController@create']);
    Route::post('/store',['as'=>'mosque_committee/store','uses'=>'MosqueCommitteeController@store']);
    Route::get('/view/{id}',['as'=>'mosque_committee/view/{id}','uses'=>'MosqueCommitteeController@view']);
    Route::get('/edit/{id}',['as'=>'mosque_committee/edit/{id}','uses'=>'MosqueCommitteeController@edit']);
    Route::post('/edit/update/{id}',['as'=>'mosque_committee/edit/update/{id}','uses'=>'MosqueCommitteeController@update']);
    Route::get('/list/delete/{id}',['as'=>'mosque_committee/list/delete/{id}','uses'=>'MosqueCommitteeController@delete']);
});

Route::group(['prefix'=>'quran_teacher'],function(){
    Route::get('/list',['as'=>'quran_teacher/list','uses'=>'QuranTeacherController@index']);
    Route::get('/add',['as'=>'quran_teacher/add','uses'=>'QuranTeacherController@create']);
    Route::post('/store',['as'=>'quran_teacher/store','uses'=>'QuranTeacherController@store']);
    Route::get('/view/{id}',['as'=>'quran_teacher/view/{id}','uses'=>'QuranTeacherController@view']);
    Route::get('/edit/{id}',['as'=>'quran_teacher/edit/{id}','uses'=>'QuranTeacherController@edit']);
    Route::post('/edit/update/{id}',['as'=>'quran_teacher/edit/update/{id}','uses'=>'QuranTeacherController@update']);
    Route::get('/list/delete/{id}',['as'=>'quran_teacher/list/delete/{id}','uses'=>'QuranTeacherController@delete']);
});

Route::group(['prefix'=>'hafiz'],function(){
    Route::get('/list',['as'=>'hafiz/list','uses'=>'MosqueCommitteeController@index']);
    Route::get('/add',['as'=>'hafiz/add','uses'=>'MosqueCommitteeController@create']);
    Route::post('/store',['as'=>'hafiz/store','uses'=>'MosqueCommitteeController@store']);
    Route::get('/view/{id}',['as'=>'hafiz/view/{id}','uses'=>'MosqueCommitteeController@view']);
    Route::get('/edit/{id}',['as'=>'hafiz/edit/{id}','uses'=>'MosqueCommitteeController@edit']);
    Route::post('/edit/update/{id}',['as'=>'hafiz/edit/update/{id}','uses'=>'MosqueCommitteeController@update']);
    Route::get('/list/delete/{id}',['as'=>'hafiz/list/delete/{id}','uses'=>'MosqueCommitteeController@delete']);
});

//Daerah Mukim ajax
Route::get('/getmukimfromdaerah','DaerahController@getMukim');
