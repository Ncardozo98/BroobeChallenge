<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetricHistoryRunController;

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
})->name('home');

Route::get('/runs', [MetricHistoryRunController::class, 'index'])->name('run.index');
Route::get('/runCreate', [MetricHistoryRunController::class, 'create'])->name('run.create');
Route::post('/runStore', [MetricHistoryRunController::class, 'store'])->name('run.store');