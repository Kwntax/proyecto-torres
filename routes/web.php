<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrupoController; 
use App\Http\Controllers\AlumnosController; 
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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/grupo', [AlumnosController::class, 'show'])->name('dashboard');
});
/*Route::get('/grupo', [GrupoController::class, 'show'])->middleware('auth');*/
Route::get('post/edit/{matricula}', [AlumnosController::class, 'edit'])->middleware('auth')->name('post.edit');



