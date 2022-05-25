<?php

use Illuminate\Support\Facades\Route;

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
})->name('home');
Route::get('/documentation',function (){
    return view('doc');
})->name('doc');
Route::post('/checking',[\App\Http\Controllers\TestController::class,'check'])->name('check');
Route::post('store',[\App\Http\Controllers\DocumentController::class,'store']);
