<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ContactFormController;
use App\Models\User;

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

    //$user = factory(\App\User::class)->create();
    $user = User::factory()->create();

    $user->phone()->create([
        'phone' => '222-333-4567',
    ]);

});


Route::view('about', 'about');

Route::get('customers', [CustomersController::class, 'index'])->name('customers.index');
Route::get('customers/create', [CustomersController::class, 'create'])->name('customers.create');
Route::post('customers', [CustomersController::class, 'store'])->name('customers.store');

Route::get('customers/{customer}', [CustomersController::class, 'show'])->name('customers.show')->middleware('can:view,customer');
Route::get('customers/{customer}/edit', [CustomersController::class, 'edit'])->name('customers.edit');
Route::put('customers/{customer}', [CustomersController::class, 'update'])->name('customers.update');
Route::delete('customers/{customer}', [CustomersController::class, 'destroy'])->name('customers.destroy');

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
