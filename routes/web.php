<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ArrivalController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

Route::get('/feature',[FeatureController::class,'feature']);
Route::get('/arrival',[ArrivalController::class,'arrival']);


Route::get('/create',[FeatureController::class,'create']);
Route::post('/store',[FeatureController::class,'store']);

Route::get('/new',[ArrivalController::class,'new']);
Route::post('/arrivalstore',[ArrivalController::class,'arrivalstore']);


Route::get('/arrival-show/{id}', [ArrivalController::class, 'show']);
Route::get('/arrival-edit/{id}', [ArrivalController::class, 'edit']);
Route::post('/arrival-update/', [ArrivalController::class, 'update']);
Route::get('/arrival-delete/{id}', [ArrivalController::class, 'destroy']);

Route::get('/feature-show/{id}', [FeatureController::class, 'show']);
Route::get('/feature-edit/{id}', [FeatureController::class, 'edit']);
Route::post('/feature-update/', [FeatureController::class, 'update']);
Route::get('/feature-delete/{id}', [FeatureController::class, 'destroy']);


