<?php

use App\Http\Controllers\DateController;
use App\Http\Controllers\GenerateRandomData;
use App\Http\Controllers\HourController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('teachers', TeacherController::class);
Route::resource('rooms', RoomController::class);
Route::get('tables',[TablesController::class,'index']);
Route::post('/attachTeacherToRoom',[TablesController::class,'attachTeacherToRoom']);
Route::post('/attachTeacherToRoomCreate',[TablesController::class,'attachTeacherToRoomCreate']);
Route::get('/editAttachTeacherToRoom/{id}',[TablesController::class,'editAttachTeacherToRoom']);
Route::put('/editAttachTeacherToRoom/{id}',[TablesController::class,'postAttachTeacherToRoom']);
Route::delete('/editAttachTeacherToRoom/{id}',[TablesController::class,'deleteAttachTeacherToRoom']);
Route::get('/flushAllData',[TablesController::class,'deleteAllData']);
Route::resource('dates', DateController::class);
Route::resource('hours', HourController::class);
Route::get('/generateRandomData',[GenerateRandomData::class ,'generateRandomData']);
Route::get('/print',[PrintController::class ,'PrintData']);
