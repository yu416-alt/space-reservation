<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\HelloMiddleware;


Route::get('/', function () {
    return view('welcome');
});


Route::get('calendar','App\Http\Controllers\CalendarController@index');
//Route::post('calendar','App\Http\Controllers\CalendarController@post');
Route::get('calendar/members_login','App\Http\Controllers\CalendarController@members_login');
Route::get('calendar/schedule','App\Http\Controllers\CalendarController@schedule');
Route::get('calendar/form','App\Http\Controllers\CalendarController@form');
Route::post('calendar/form','App\Http\Controllers\CalendarController@form');
Route::get('calendar/form/reserve_check','App\Http\Controllers\CalendarController@reserve_check');
Route::post('calendar/form/reserve_check','App\Http\Controllers\CalendarController@reserve_check');
Route::post('calendar/form/reserve_done','App\Http\Controllers\CalendarController@reserve_done');

Route::get('calendar/memberform','App\Http\Controllers\CalendarController@memberform');
Route::post('calendar/memberform','App\Http\Controllers\CalendarController@memberform');
Route::post('calendar/memberform/reserve_done','App\Http\Controllers\CalendarController@reserve_done');

Route::get('member','App\Http\Controllers\MemberController@index');
Route::post('member','App\Http\Controllers\MemberController@post');
Route::get('member/logout','App\Http\Controllers\MemberController@logout_get');
Route::post('member/logout','App\Http\Controllers\MemberController@logout_post');

Route::get('hello','App\Http\Controllers\HelloController@index');
Route::post('hello','App\Http\Controllers\HelloController@post');
Route::get('hello/add','App\Http\Controllers\HelloController@add');
Route::post('hello/add','App\Http\Controllers\HelloController@create');
Route::get('hello/edit','App\Http\Controllers\HelloController@edit');
Route::post('hello/edit','App\Http\Controllers\HelloController@update');
Route::get('hello/del','App\Http\Controllers\HelloController@del');
Route::post('hello/del','App\Http\Controllers\HelloController@remove');
Route::get('hello/show','App\Http\Controllers\HelloController@show');
Route::get('hello/rest','App\Http\Controllers\HelloController@rest');
Route::get('hello/session','App\Http\Controllers\HelloController@ses_get');
Route::post('hello/session','App\Http\Controllers\HelloController@ses_put');

Route::get('person','App\Http\Controllers\PersonController@index');
Route::get('person/find','App\Http\Controllers\PersonController@find');
Route::post('person/find','App\Http\Controllers\PersonController@search');
Route::get('person/add','App\Http\Controllers\PersonController@add');
Route::post('person/add','App\Http\Controllers\PersonController@create');
Route::get('person/edit','App\Http\Controllers\PersonController@edit');
Route::post('person/edit','App\Http\Controllers\PersonController@update');
Route::get('person/del','App\Http\Controllers\PersonController@delete');
Route::post('person/del','App\Http\Controllers\PersonController@remove');

Route::get('board','App\Http\Controllers\BoardController@index');
Route::get('board/add','App\Http\Controllers\BoardController@add');
Route::post('board/add','App\Http\Controllers\BoardController@create');

Route::resource('rest','App\Http\Controllers\RestappController');
