<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('talk','Talk\TalkController');
Route::resource('attendee','Attendee\AttendeeController');
Route::resource('attendee_talk','Attendee\AttendeeTalkController');
Route::get('all_attendee_talk/{attendee}','Attendee\AttendeeTalkController@allAttendeeTalk');
Route::get('all_talk_attendee/{talk}','Attendee\AttendeeTalkController@allTalkAttendee');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});