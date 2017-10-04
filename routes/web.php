<?php

Route::get('/', function() {
  return view('welcome');
});

/*========================================================*/
// auth routes
Route::get('/login', 'LoginCtrl@login');

Route::post('/login', 'LoginCtrl@postLogin');

Route::get('/register', 'RegisterCtrl@register');

Route::post('/register', 'RegisterCtrl@postRegister');

Route::post('/logout', 'LoginCtrl@logout');

/*========================================================*/

// warehouse routes
Route::get('/warehouse/add', 'WarehouseCtrl@add');

Route::post('/warehouse/add', 'WarehouseCtrl@postAdd');

Route::get('/warehouses/view', 'WarehouseCtrl@vieWarehouses');

Route::delete('/warehouse/{id}/delete', 'WarehouseCtrl@delete');

// View Shoppings
Route::get('/shoppings/system/view', 'ShopCtrl@adminView');

// client routes
Route::get('/shop/online', 'ShopCtrl@index');

Route::post('/shop/online', 'ShopCtrl@shop');

/*=================================================================*/

Route::get('/home', 'HomeController@index');
Route::resource('categories', 'CategoriesController');
Route::resource('products', 'ProductsController');
Route::get('/catalogs', 'CatalogsController@index');
Route::post('cart', 'CartController@addProduct');
Route::get('cart', 'CartController@show');
Route::delete('cart/{product_id}', 'CartController@removeProduct');
Route::put('cart/{product_id}', 'CartController@changeQuantity');
Route::get('checkout/login', 'CheckoutController@login');
Route::post('checkout/login', 'CheckoutController@postLogin');

Route::get('checkout/address', 'CheckoutController@address');
Route::post('checkout/address', 'CheckoutController@postAddress');

Route::get('/checkout/payment', 'CheckoutController@payment');
Route::post('checkout/payment', 'CheckoutController@postPayment');

Route::get('/success', 'CheckoutController@success');

Route::resource('orders', 'OrdersController', ['only' => [
    'index', 'edit', 'update'
]]);

Route::get('/home/orders', 'HomeController@viewOrders');