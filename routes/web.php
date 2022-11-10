<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovimentoController;
use App\Http\Controllers\TipoMovimentoController;
use App\Models\TipoMovimento;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');

Route::group([
    "prefix" => "movimento",
    "middleware" => "auth"
], function () {
    Route::get('/', [MovimentoController::class, "index"])->name('movimento');
    Route::get('/tipo-movimento', [TipoMovimentoController::class, "index"])->name('movimento.tipo.movimento');
});

require __DIR__ . '/auth.php';
