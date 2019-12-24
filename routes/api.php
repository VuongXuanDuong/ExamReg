<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/all-modules/{userId}', 'StudentLayoutController@getAllModules');
Route::post('/register-exam-sessions', 'StudentLayoutController@registerExamSessions');

Route::get('/all-module-registrated/{userId}','StudentLayoutController@registerExamShift');
Route::delete('/unregister/{examRoomUserId}','StudentLayoutController@unRegisterAShift');