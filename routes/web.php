<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ContactFormController;

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

Route::view('/', 'home');

Route::view('about', 'about');

Route::get('customers', [CustomersController::class, 'index']);
Route::get('customers/create', [CustomersController::class, 'create']);
Route::post('customers', [CustomersController::class, 'store']);

Route::get('customers/{customer}', [CustomersController::class, 'show']);
Route::get('customers/{customer}/edit', [CustomersController::class, 'edit']);
Route::put('customers/{customer}', [CustomersController::class, 'update'])->name('customer.update');
Route::delete('customers/{customer}', [CustomersController::class, 'destroy']);

Route::get('contact', [ContactFormController::class, 'create'])->name('contact.create');
Route::post('contact', [ContactFormController::class, 'store'])->name('contact.store');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
