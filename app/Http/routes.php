<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'login', 'uses' => 'Auth\AuthController@index']);
Route::post('/login', 'Auth\AuthController@login');

route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

route::resource('users', 'UsersController', ['except' => 'show']);
route::resource('fcontacts', 'FcontactsController', ['only' => ['store', 'destroy']]);
route::resource('addresses', 'AddressesController', ['only' => ['store', 'destroy']]);

route::resource('clients', 'Clientscontroller', ['except' => 'show']);
route::resource('deliveries', 'DeliveriesController', ['only' => ['store', 'destroy']]);
route::resource('contacts', 'ContactsController', ['only' => ['store', 'destroy']]);

route::resource('providers', 'Providerscontroller', ['except' => 'show']);

route::resource('families', 'FamiliesController', ['only' => ['index', 'store', 'destroy']]);
route::resource('groups', 'GroupsController', ['only' => ['index', 'store', 'destroy']]);
route::resource('categories', 'CategoriesController', ['only' => ['index', 'store', 'destroy']]);
route::resource('subcategories', 'SubcategoriesController', ['only' => ['index', 'store', 'destroy']]);
route::resource('modes', 'ModesController', ['only' => ['index', 'store', 'destroy']]);
route::resource('discounts', 'DiscountsController', ['only' => ['index', 'store', 'destroy']]);

route::get('/logout', ['as' => 'logout', 'uses' => 'HomeController@logout']);