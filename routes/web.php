<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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
});

//user logged
Route::group(['middleware' => 'auth.user'], function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
    Route::get('/address/{id}', [App\Http\Controllers\addressController::class, 'address'])->name('address');
    // addressregister
    Route::post('/save_address', [App\Http\Controllers\addressController::class, 'save_address'])->name('save_address');
    Route::post('/update_address', [App\Http\Controllers\addressController::class, 'update_address'])->name('update_address');
    //user register
    Route::post('/update_register', [App\Http\Controllers\UserController::class, 'update_register'])->name('update_register');
    Route::post('/delete_user', [App\Http\Controllers\UserController::class, 'delete_user'])->name('delete_user');
    Route::get('/user_infos/{id}', [App\Http\Controllers\UserController::class, 'user_infos']);
    //user contacts
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});

//user login
Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/user_login', [App\Http\Controllers\UserController::class, 'user_login']);

//user register
Route::get('/register', [App\Http\Controllers\UserController::class, 'register']);
Route::post('/save_register', [App\Http\Controllers\UserController::class, 'save_register'])->name('save_user');
