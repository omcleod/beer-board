<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeerBoardController;
use App\Http\Controllers\BeerBoardAdminController;
use Inertia\Inertia;

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

Route::get('/', [BeerBoardController::class, 'index']);

Route::get('/dashboard', [BeerBoardAdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('beers', BeerBoardAdminController::class);

require __DIR__.'/auth.php';
