<?php

use App\Http\Controllers\DateController;
use App\Http\Controllers\GenerateRandomData;
use App\Http\Controllers\HourController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('teachers', TeacherController::class);
Route::resource('rooms', RoomController::class);
Route::get('tables',[TablesController::class,'index']);
Route::post('/attachTeacherToRoom',[TablesController::class,'attachTeacherToRoom']);
Route::post('/attachTeacherToRoomCreate',[TablesController::class,'attachTeacherToRoomCreate']);
Route::get('/editAttachTeacherToRoom/{room}/{teacher}/{day}/{hour}',[TablesController::class,'editAttachTeacherToRoom']);
Route::put('/editAttachTeacherToRoom/{room}/{teacher}/{day}/{hour}',[TablesController::class,'postAttachTeacherToRoom']);
Route::delete('/editAttachTeacherToRoom/{room}/{teacher}/{day}/{hour}',[TablesController::class,'deleteAttachTeacherToRoom']);
Route::get('/flushAllData',[TablesController::class,'deleteAllData']);
Route::resource('dates', DateController::class);
Route::resource('hours', HourController::class);
Route::get('/generateRandomData',[GenerateRandomData::class ,'generateRandomData']);
Route::get('/print',[PrintController::class ,'PrintData']);
