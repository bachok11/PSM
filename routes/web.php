<?php

use Carbon\Carbon;

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

Route::get('/register_user', 'UserController@create')->name('register_user');
Route::post('/register_user', 'UserController@store')->name('register_user');

Route::group(['prefix'=>'mosque_committee'],function(){
    Route::get('/list',['as'=>'mosque_committee/list','uses'=>'MosqueCommitteeController@index']);
    Route::get('/add',['as'=>'mosque_committee/add','uses'=>'MosqueCommitteeController@create'])->middleware('can:mosque_committee_add');
    Route::post('/store',['as'=>'mosque_committee/store','uses'=>'MosqueCommitteeController@store'])->middleware('can:mosque_committee_add');
    Route::get('/view/{id}',['as'=>'mosque_committee/view/{id}','uses'=>'MosqueCommitteeController@view']);
    Route::get('/edit/{id}',['as'=>'mosque_committee/edit/{id}','uses'=>'MosqueCommitteeController@edit'])->middleware('can:mosque_committee_edit');
    Route::post('/edit/update/{id}',['as'=>'mosque_committee/edit/update/{id}','uses'=>'MosqueCommitteeController@update'])->middleware('can:mosque_committee_edit');
    Route::get('/list/delete/{id}',['as'=>'mosque_committee/list/delete/{id}','uses'=>'MosqueCommitteeController@destroy'])->middleware('can:mosque_committee_delete');
});

Route::group(['prefix'=>'quran_teacher'],function(){
    Route::get('/list',['as'=>'quran_teacher/list','uses'=>'QuranTeacherController@index'])->middleware('can:quran_teacher_view');
    Route::get('/add',['as'=>'quran_teacher/add','uses'=>'QuranTeacherController@create'])->middleware('can:quran_teacher_add');
    Route::post('/store',['as'=>'quran_teacher/store','uses'=>'QuranTeacherController@store'])->middleware('can:quran_teacher_add');
    Route::get('/view/{id}',['as'=>'quran_teacher/view/{id}','uses'=>'QuranTeacherController@view'])->middleware('can:quran_teacher_view');
    Route::get('/edit/{id}',['as'=>'quran_teacher/edit/{id}','uses'=>'QuranTeacherController@edit'])->middleware('can:quran_teacher_edit');
    Route::post('/edit/update/{id}',['as'=>'quran_teacher/edit/update/{id}','uses'=>'QuranTeacherController@update'])->middleware('can:quran_teacher_edit');
    Route::get('/list/delete/{id}',['as'=>'quran_teacher/list/delete/{id}','uses'=>'QuranTeacherController@destroy'])->middleware('can:quran_teacher_delete');
});

Route::group(['prefix'=>'hafiz'],function(){
    Route::get('/list',['as'=>'hafiz/list','uses'=>'HafizController@index'])->middleware('can:hafiz_view');
    Route::get('/add',['as'=>'hafiz/add','uses'=>'HafizController@create'])->middleware('can:hafiz_add');
    Route::post('/store',['as'=>'hafiz/store','uses'=>'HafizController@store'])->middleware('can:hafiz_add');
    Route::get('/view/{id}',['as'=>'hafiz/view/{id}','uses'=>'HafizController@view'])->middleware('can:hafiz_view');
    Route::get('/edit/{id}',['as'=>'hafiz/edit/{id}','uses'=>'HafizController@edit'])->middleware('can:hafiz_edit');
    Route::post('/edit/update/{id}',['as'=>'hafiz/edit/update/{id}','uses'=>'HafizController@update'])->middleware('can:hafiz_edit');
    Route::get('/list/delete/{id}',['as'=>'hafiz/list/delete/{id}','uses'=>'HafizController@destroy'])->middleware('can:hafiz_delete');
});

Route::group(['prefix'=>'appointment'],function(){
    Route::get('/list',['as'=>'appointment/list','uses'=>'AppointmentController@index'])->middleware('can:appointment_view');
    Route::get('/add',['as'=>'appointment/add','uses'=>'AppointmentController@create'])->middleware('can:appointment_add');
    Route::post('/store',['as'=>'appointment/store','uses'=>'AppointmentController@store'])->middleware('can:appointment_add');
    Route::get('/view/{id}',['as'=>'appointment/view/{id}','uses'=>'AppointmentController@view'])->middleware('can:appointment_view');
    Route::get('/edit/{id}',['as'=>'appointment/edit/{id}','uses'=>'AppointmentController@edit'])->middleware('can:appointment_edit');
    Route::post('/edit/update/{id}',['as'=>'appointment/edit/update/{id}','uses'=>'AppointmentController@update'])->middleware('can:appointment_edit');
    Route::get('/list/delete/{id}',['as'=>'appointment/list/delete/{id}','uses'=>'AppointmentController@destroy'])->middleware('can:appointment_delete');
    Route::get('/list/approve_test/{id}',['as'=>'appointment/list/approve_test/{id}','uses'=>'AppointmentController@approveTest'])->middleware('can:appointment_pass_test');
});

Route::group(['prefix'=>'payment'],function(){
    Route::get('/make_payment',['as'=>'payment/list','uses'=>'PaymentController@index']);
    Route::post('/make_payment', function (Request $request) {
        \Stripe\Stripe::setApiKey ( 'test_SecretKey' );
        try {
            \Stripe\Charge::create ( array (
                    "amount" => 300 * 100,
                    "currency" => "myr",
                    "source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
                    "description" => "Test payment." 
            ) );
            Session::flash ( 'success-message', 'Payment done successfully !' );
            return Redirect::back ();
        } catch ( Exception $e ) {
            Session::flash ( 'fail-message', "Error! Please Try again." );
            return Redirect::back ();
        }
    });
});

//Daerah Mukim ajax
Route::get('/getmukimfromdaerah','DaerahController@getMukim');

Route::get('/report','DaerahController@getReport');

