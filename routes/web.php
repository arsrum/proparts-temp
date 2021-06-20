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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//   return view('dashboard');
// })->name('dashboard');

Route::get('/', function () {
  return view('index');
})->name('home');

Route::get('/main-parts', function () {
  return view('main-parts');
})->name('main-parts');

Route::get('/sub-parts', function () {
  return view('sub-parts');
})->name('sub-parts');

Route::get('/item-details', function () {
  return view('item-details');
})->name('item-details');

Route::get('/confirm-order', function () {
  return view('confirm-order');
})->name('confirm-order');

Route::get('/shipping-details', function () {
  return view('shipping-details');
})->name('shipping-details');

Route::get('/payment', function () {
  return view('payment');
})->name('payment');

Route::get('/done', function () {
  return view('done');
})->name('done');
