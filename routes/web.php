<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// table list ma data show krwaya
Route::get('/show-data', [App\Http\Controllers\UserController::class, 'data'])->name('ShowData');

// edit krwnay ka route 
Route::get('/data-edit{$id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('userEdit');

// update data jo data change krya ga voh ay ga isma
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

// delete route create
Route::delete('/user/{id}', [UserController::class, 'delete'])->name('user.delete');

// create user  route 
Route::post('/user', [UserController::class, 'create'])->name('user.create');




// billing ui route
Route::get('/billing', [App\Http\Controllers\UserController::class, 'uibilling'])->name('billingUi');

// profile ui
Route::get('/profile', [App\Http\Controllers\UserController::class, 'uiProfile'])->name('profileUi');


