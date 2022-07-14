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

Route::get('/', [\App\Http\Controllers\ProjectController::class, 'allProjects'])->name('allProjects');

Route::get('/login', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');
Route::post('/authCouncilor', [\App\Http\Controllers\Auth\AuthController::class, 'authenticate'])->name('postLogin');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/logout-councilor', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
    
    //PROJECTS
    Route::get('/meus-projetos', [\App\Http\Controllers\ProjectController::class, 'index'])->name('myProjects');
    Route::get('/cadastrar-projeto', [\App\Http\Controllers\ProjectController::class, 'create'])->name('newProject');
    Route::post('/post/project', [\App\Http\Controllers\ProjectController::class, 'store'])->name('storeProject');

    //COMMISSION
    Route::get('/cadastrar-comissao', [\App\Http\Controllers\CommissionController::class, 'create'])->name('newCommission');
    Route::post('/post/commission', [\App\Http\Controllers\CommissionController::class, 'store'])->name('storeCommission');

    Route::get('/cadastrar-vereador', [\App\Http\Controllers\CouncilorController::class, 'create'])->name('newCouncilor');
    Route::post('/post/councilor', [\App\Http\Controllers\CouncilorController::class, 'store'])->name('storeCouncilor');

});
