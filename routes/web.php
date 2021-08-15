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
Route::post('/main-partss', 'FrontEnd\SearchController@AssemblyGroups')->name('AssemblyGroups');
Route::post('/main-parts', 'FrontEnd\SearchController@getVehicleByVin')->name('getVehicleByVin');
Route::get('getState','FrontEnd\SearchController@model')->name('getState');
Route::get('getType','FrontEnd\SearchController@type')->name('type');

Route::get('/sub-parts/{assemblyGroupNodeId}/{carId}', 'FrontEnd\SearchController@Articles')->name('Articles');
Route::get('/item-details/{node}/{id}/{car}', 'FrontEnd\SearchController@SingleArticles')->name('SingleArticles');
Route::post('/cart-add', 'FrontEnd\CartController@Add')->name('Cart-Add');
Route::post('/cart-buy', 'FrontEnd\CartController@Buy')->name('Cart-Buy');
Route::post('/cart-clear', 'FrontEnd\CartController@cartDelete')->name('Cart-Clear');

Route::post('/cart-remove/{id}', 'FrontEnd\CartController@remove')->name('Cart-Remove');

Route::get('/cart-list', 'FrontEnd\CartController@index')->name('Cart-List');
Route::get('/profile', 'FrontEnd\UserFrontendController@index')->name('profile');
Route::get('/orders', 'FrontEnd\UserFrontendController@orders')->name('orders');
Route::get('/contact-us', 'FrontEnd\UserFrontendController@contactus')->name('contact-us');
Route::post('/contact-us', 'FrontEnd\UserFrontendController@contactUsStore')->name('contact-us.store');
Route::post('/store-address', 'Admin\AddressesController@store')->name('shipping-store');
Route::get('/shipping-details', 'FrontEnd\OrderManagerController@index')->name('shipping-details');
Route::get('/user-login', 'FrontEnd\UserFrontendController@loginShow')->name('user-login.show');
Route::get('/user-register', 'Auth\RegisterController@create')->name('user-register.show');
Route::get('/user-login', 'FrontEnd\UserFrontendController@loginShow')->name('user-login.show');

Route::post('/user-login', 'FrontEnd\UserFrontendController@loginPost')->name('user-login.post');
Route::get('/logout', 'FrontEnd\UserFrontendController@logout')->name('logout');
Route::get('/products/show/{id}', 'Admin\ProductsController@show')->name('products.show');

 Route::get('/inventory', function () {
   return view('Frontend.inventory');
 })->name('inventory');


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

//  Route::get('/shipping-details', function () {
//    return view('Frontend.shipping-details');
//  })->name('shipping-details');

Route::post('/payment', 'FrontEnd\OrderManagerController@store')->name('payment');

// Route::get('/payment', function () {
//   return view('Frontend.payment');
// })->name('payment');

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
  Route::get('seller_orders', 'OrdersController@seller')->name('orders.seller');

  // Statuses
  Route::delete('statuses/destroy', 'StatusesController@massDestroy')->name('statuses.massDestroy');
  Route::resource('statuses', 'StatusesController');

  // Contact Us
  Route::delete('contactuses/destroy', 'ContactUsController@massDestroy')->name('contactuses.massDestroy');
  Route::resource('contactuses', 'ContactUsController');
  
  // Products
    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductsController');
    Route::get('products', 'ProductsController@index')->name('products.index');

    Route::get('products/create', 'ProductsController@create')->name('products.create');
    Route::post('products', 'ProductsController@store')->name('products.store');
    Route::get('products/edit/{id}', 'ProductsController@edit')->name('products.edit');
    Route::put('products/edit/{id}', 'ProductsController@update')->name('products.update');

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
