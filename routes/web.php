<?php

use App\Http\Controllers\UserController;
use App\Products;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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

//Route::get('users', 'UserController@index')->name('users.index');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::prefix('users')->name('users.')->group(function(){
    Route::get('users', [UserController::class, 'index'])->name('index');
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('update/{user}', [UserController::class, 'update'])->name('update');
    Route::get('show/{user}', [UserController::class, 'show'])->name('show');
    Route::get('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
});

Route::get('logout', [UserController::class, 'logout'])->name('Plantillas.sidebar');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Para el Filtrado de las Rutas se utilizan 
//Only() para indicar cuales son las que van a mostrar
//except para indicar la ecxepcion de las rutas 

