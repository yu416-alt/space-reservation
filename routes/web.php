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