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

Route::group(['prefix'=>'mosque_committee','middleware'=>'auth'],function(){
    Route::get('/list',['as'=>'mosque_committee/list','uses'=>'MosqueCommitteeController@index']);
    Route::get('/add',['as'=>'mosque_committee/add','uses'=>'MosqueCommitteeController@create']);
    Route::post('/add',['as'=>'mosque_committee/add','uses'=>'MosqueCommitteeController@store']);
    Route::get('/view/{id}',['as'=>'mosque_committee/view/{id}','uses'=>'MosqueCommitteeController@view']);
    Route::get('/edit/{id}',['as'=>'mosque_committee/edit/{id}','uses'=>'MosqueCommitteeController@edit']);
    Route::post('/edit/update/{id}',['as'=>'mosque_committee/edit/update/{id}','uses'=>'MosqueCommitteeController@update']);
    Route::get('/list/delete/{id}',['as'=>'mosque_committee/list/delete/{id}','uses'=>'MosqueCommitteeController@delete']);
});

Route::group(['prefix'=>'branch','middleware'=>'auth'],function(){
    Route::get('/add',['as'=>'branch/add','uses'=>'BranchController@create']);
    Route::post('/add',['as'=>'branch/add','uses'=>'BranchController@store']);
    // Route::get('/add/staff',['as'=>'branch/add/staff','uses'=>'BranchUserController@create']);
    Route::get('/list',['as'=>'branch/list','uses'=>'BranchController@index']);
    Route::get('/view/{id}',['as'=>'branch/view/{id}','uses'=>'BranchController@view']);
    Route::get('/list/delete/{id}',['as'=>'branch/list/delete/{id}','uses'=>'BranchController@destroy']);
    Route::get('/edit/{id}',['as'=>'branch/list/edit/{id}','uses'=>'BranchController@edit']);
    Route::post('/edit/update/{id}',['as'=>'branch/edit/update/{id}','uses'=>'BranchController@update']);
    Route::get('/getAdminName','BranchControler@getAdminName');
    Route::get('/add/staff/{companyID}',['as'=>'branch/add/staff/{companyID}','uses'=>'BranchUserController@create']);
    Route::post('/add/staff/{companyID}',['as'=>'branch/add/staff/{companyID}','uses'=>'BranchUserController@store']);
    Route::get('/getallstaff',['as'=>'branch/get/allstaff','uses'=>'BranchUserController@getallstaff']);
});