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
Route::get('/home', 'FrontEnd\SearchController@Manufactures')->name('home');
// Route::get('/main-parts', 'FrontEnd\SearchController@AssemblyGroups')->name('AssemblyGroups');
Route::post('/main-parts', 'FrontEnd\SearchController@getVehicleByVin')->name('getVehicleByVin');

Route::get('/sub-parts/{assemblyGroupNodeId}/{carId}', 'FrontEnd\SearchController@Articles')->name('Articles');
Route::get('/item-details/{node}/{id}/{car}', 'FrontEnd\SearchController@SingleArticles')->name('SingleArticles');
Route::post('/cart-add', 'FrontEnd\CartController@Add')->name('Cart-Add');
Route::post('/cart-buy', 'FrontEnd\CartController@Buy')->name('Cart-Buy');
Route::post('/cart-clear', 'FrontEnd\CartController@cartDelete')->name('Cart-Clear');

Route::post('/cart-remove/{id}', 'FrontEnd\CartController@remove')->name('Cart-Remove');

Route::get('/cart-list', 'FrontEnd\CartController@index')->name('Cart-List');

//  Route::get('/home', function () {
//    return view('frontend.index');
//  })->name('home');

// Route::get('/main-parts', function () {
//   return view('frontend.main-parts');
// })->name('main-parts');

// Route::get('/sub-parts', function () {
//   return view('frontend.sub-parts');
// })->name('sub-parts');

// Route::get('/item-details', function () {
//   return view('frontend.item-details');
// })->name('item-details');

// Route::get('/confirm-order', function () {
//   return view('frontend.confirm-order');
// })->name('confirm-order');

 Route::get('/shipping-details', function () {
   return view('Frontend.shipping-details');
 })->name('shipping-details');

Route::get('/payment', function () {
  return view('Frontend.payment');
})->name('payment');

Route::get('/done', function () {
  return view('Frontend.done');
})->name('done');


 Route::redirect('/', '/home');
// Route::get('/', function () {
//     if (session('status')) {
//         return redirect()->route('admin.home')->with('status', session('status'));
//     }

//     return redirect()->route('admin.home');
// });

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
  Route::get('/', 'HomeController@index')->name('home');
  // Permissions
  Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
  Route::resource('permissions', 'PermissionsController');

  // Roles
  Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
  Route::resource('roles', 'RolesController');

  // Users
  Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
  Route::resource('users', 'UsersController');

  // Addresses
  Route::delete('addresses/destroy', 'AddressesController@massDestroy')->name('addresses.massDestroy');
  Route::resource('addresses', 'AddressesController');

  // Cars
  Route::delete('cars/destroy', 'CarsController@massDestroy')->name('cars.massDestroy');
  Route::resource('cars', 'CarsController');

  // Orders
  Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
  Route::resource('orders', 'OrdersController');

  // Statuses
  Route::delete('statuses/destroy', 'StatusesController@massDestroy')->name('statuses.massDestroy');
  Route::resource('statuses', 'StatusesController');

  // Contact Us
  Route::delete('contactuses/destroy', 'ContactUsController@massDestroy')->name('contactuses.massDestroy');
  Route::resource('contactuses', 'ContactUsController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
  // Change password
  if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
      Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
      Route::post('password', 'ChangePasswordController@update')->name('password.update');
      Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
      Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
  }
});
