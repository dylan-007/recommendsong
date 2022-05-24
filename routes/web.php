<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MyController;

use Illuminate\Http\Request;

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
    return view('speech_page');
});

// Route::get('predict',[MyController::class,'index']);
Route::post('result',[MyController::class,'index']);
Route::get('result',[MyController::class,'index']);
Route::post('result1',[MyController::class,'index']);
Route::get('result1',[MyController::class,'index']);
Route::post('SpeechOutput',[MyController::class,'SpeechOutput']);
Route::get('SpeechOutput',[MyController::class,'SpeechOutput']);

Route::get('image-upload', [ MyController::class, 'Upload' ])->name('image.upload');
Route::post('image-upload', [ MyController::class, 'UploadPost' ])->name('image.upload.post');

Route::post('/save',[MyController::class,'recVidUpload']);

Route::get('/recommend',[MyController::class,'recommend']);
Route::post('/recommend',[MyController::class,'recommend']);


Route::get('temp_res',[MyController::class,'tmpfunc']);
Route::post('temp_res',[MyController::class,'tmpfunc']);
