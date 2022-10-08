<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupsController; 

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
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
});
Route::get('/crud/create', function () {
    return view('crud.create');
});
Route::get('/crud/index', function () {
    return view('crud.index');
});

Route::get('grupo', [GroupsController::class, 'getDataApi']);

