<?php

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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
	//Roles
	Route::get('roles/create', 'Role\RoleController@create')->name('roles.create')
	->middleware('permission:roles.create');
	Route::post('roles/store', 'Role\RoleController@store')->name('roles.store')
	->middleware('permission:roles.create');

	Route::get('roles/{role}/edit', 'Role\RoleController@edit')->name('roles.edit')
	->middleware('permission:roles.edit');
	Route::put('roles/{role}', 'Role\RoleController@update')->name('roles.update')
	->middleware('permission:roles.edit');

	Route::get('roles', 'Role\RoleController@index')->name('roles.index')
	->middleware('permission:roles.index');
	Route::get('roles/{role}', 'Role\RoleController@show')->name('roles.show')
	->middleware('permission:roles.show');

	Route::delete('roles/{role}', 'Role\RoleController@destroy')->name('roles.destroy')
	->middleware('permission:roles.destroy');

	//Users
	Route::get('users/create', 'User\UserController@create')->name('users.create')
	->middleware('permission:users.create');
	Route::post('users/store', 'User\UserController@store')->name('users.store')
	->middleware('permission:users.create');

	Route::get('users/{user}/edit', 'User\UserController@edit')->name('users.edit')
	->middleware('permission:users.edit');
	Route::put('users/{user}', 'User\UserController@update')->name('users.update')
	->middleware('permission:users.edit');

	Route::get('users', 'User\UserController@index')->name('users.index')
	->middleware('permission:users.index');
	Route::get('users/{user}', 'User\UserController@show')->name('users.show')
	->middleware('permission:users.show');

	Route::delete('users/{user}', 'User\UserController@destroy')->name('users.destroy')
	->middleware('permission:users.destroy');

	//Products
	Route::get('products/create', 'Product\ProductController@create')->name('products.create')
	->middleware('permission:products.create');
	Route::post('products/store', 'Product\ProductController@store')->name('products.store')
	->middleware('permission:products.create');

	Route::get('products/{product}/edit', 'Product\ProductController@edit')->name('products.edit')
	->middleware('permission:products.edit');
	Route::put('products/{product}', 'Product\ProductController@update')->name('products.update')
	->middleware('permission:products.edit');

	Route::get('products', 'Product\ProductController@index')->name('products.index')
	->middleware('permission:products.index');
	Route::get('products/{product}', 'Product\ProductController@show')->name('products.show')
	->middleware('permission:products.show');

	Route::delete('products/{product}', 'Product\ProductController@destroy')->name('products.destroy')
	->middleware('permission:products.destroy');
});
