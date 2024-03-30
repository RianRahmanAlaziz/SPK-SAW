<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ProsesHitungController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SubkriteriaController;

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
    return view('home');
})->name('login');

Route::post('/login', [HomeController::class, 'login']);
Route::post('/logout', [HomeController::class, 'logout']);

Route::get('/dashboard', [HomeController::class, 'home'])->middleware('auth');
Route::get('/dashboard/datakriteria', [KriteriaController::class, 'index'])->middleware('auth');
Route::get('/dashboard/databobot', [BobotController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/datasiswa', SiswaController::class)->middleware('auth');
Route::resource('/dashboard/datakelas', KelasController::class)->middleware('auth');
Route::resource('/dashboard/datasubkriteria', SubkriteriaController::class)->middleware('auth');

Route::get('/dashboard/analisis-hasil', [ProsesHitungController::class, 'index'])->middleware('auth');
Route::post('/proseshitung', [ProsesHitungController::class, 'proseshitung']);
Route::post('/sesinilaiv', [ProsesHitungController::class, 'sesinilaiv']);
Route::post('/proseshitungv', [ProsesHitungController::class, 'proseshitungv']);
