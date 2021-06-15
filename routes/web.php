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

Route::get('/', function () {
  return view('index');
});

Route::get('/main-parts', function () {
  return view('main-parts');
})->name('main-parts');

Route::get('/sub-parts', function () {
  return view('sub-parts');
})->name('sub-parts');

Route::get('/item-details', function () {
  return view('item-details');
})->name('item-details');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  return view('dashboard');
})->name('dashboard');
