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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');



Route::get('/', function () {

    return view('welcome');

});


Route::auth();


Route::group(['middleware' => ['auth']], function() {


	Route::get('/home', 'HomeController@index');


	Route::resource('users','UserController');


	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);

	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);

	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);

	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);

	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);

	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);

	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

	Route::get('country',['as'=>'country.index','uses'=>'CountryController@index','middleware' => ['permission:country-list|country-create|country-edit|country-delete']]);

	Route::get('country/create',['as'=>'country.create','uses'=>'CountryController@create','middleware' => ['permission:country-create']]);

	Route::post('country/create',['as'=>'country.store','uses'=>'CountryController@store','middleware' => ['permission:country-create']]);

	Route::get('country/{id}',['as'=>'country.show','uses'=>'CountryController@show']);

	Route::get('country/{id}/edit',['as'=>'country.edit','uses'=>'CountryController@edit','middleware' => ['permission:country-edit']]);
	
	Route::patch('country/{id}',['as'=>'country.update','uses'=>'CountryController@update','middleware' => ['permission:country-edit']]);

	Route::delete('country/{id}',['as'=>'country.destroy','uses'=>'CountryController@destroy','middleware' => ['permission:country-delete']]);



	Route::get('state',['as'=>'state.index','uses'=>'StateController@index','middleware' => ['permission:state-list|state-create|state-edit|state-delete']]);

	Route::get('state/create',['as'=>'state.create','uses'=>'StateController@create','middleware' => ['permission:state-create']]);

	Route::post('state/create',['as'=>'state.store','uses'=>'StateController@store','middleware' => ['permission:state-create']]);

	Route::get('state/{id}',['as'=>'state.show','uses'=>'StateController@show']);

	Route::get('state/{id}/edit',['as'=>'state.edit','uses'=>'StateController@edit','middleware' => ['permission:state-edit']]);
	
	Route::patch('state/{id}',['as'=>'state.update','uses'=>'StateController@update','middleware' => ['permission:state-edit']]);

	Route::delete('state/{id}',['as'=>'state.destroy','uses'=>'StateController@destroy','middleware' => ['permission:state-delete']]);



	Route::get('city',['as'=>'city.index','uses'=>'CityController@index','middleware' => ['permission:city-list|city-create|city-edit|city-delete']]);

	Route::get('city/create',['as'=>'city.create','uses'=>'CityController@create','middleware' => ['permission:city-create']]);

	Route::post('city/create',['as'=>'city.store','uses'=>'CityController@store','middleware' => ['permission:city-create']]);

	Route::get('city/{id}',['as'=>'city.show','uses'=>'CityController@show']);

	Route::get('city/{id}/edit',['as'=>'city.edit','uses'=>'CityController@edit','middleware' => ['permission:city-edit']]);
	
	Route::patch('city/{id}',['as'=>'city.update','uses'=>'CityController@update','middleware' => ['permission:city-edit']]);

	Route::delete('city/{id}',['as'=>'city.destroy','uses'=>'CityController@destroy','middleware' => ['permission:city-delete']]);





	Route::get('pincode',['as'=>'pincode.index','uses'=>'PincodeController@index','middleware' => ['permission:pincode-list|pincode-create|pincode-edit|pincode-delete']]);

	Route::get('pincode/create',['as'=>'pincode.create','uses'=>'PincodeController@create','middleware' => ['permission:pincode-create']]);

	Route::post('pincode/create',['as'=>'pincode.store','uses'=>'PincodeController@store','middleware' => ['permission:pincode-create']]);

	Route::get('pincode/{id}',['as'=>'pincode.show','uses'=>'PincodeController@show']);

	Route::get('pincode/{id}/edit',['as'=>'pincode.edit','uses'=>'PincodeController@edit','middleware' => ['permission:pincode-edit']]);
	
	Route::patch('pincode/{id}',['as'=>'pincode.update','uses'=>'PincodeController@update','middleware' => ['permission:pincode-edit']]);

	Route::delete('pincode/{id}',['as'=>'pincode.destroy','uses'=>'PincodeController@destroy','middleware' => ['permission:pincode-delete']]);














	Route::get('itemCRUD2',['as'=>'itemCRUD2.index','uses'=>'ItemCRUD2Controller@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);

	Route::get('itemCRUD2/create',['as'=>'itemCRUD2.create','uses'=>'ItemCRUD2Controller@create','middleware' => ['permission:item-create']]);

	Route::post('itemCRUD2/create',['as'=>'itemCRUD2.store','uses'=>'ItemCRUD2Controller@store','middleware' => ['permission:item-create']]);

	Route::get('itemCRUD2/{id}',['as'=>'itemCRUD2.show','uses'=>'ItemCRUD2Controller@show']);

	Route::get('itemCRUD2/{id}/edit',['as'=>'itemCRUD2.edit','uses'=>'ItemCRUD2Controller@edit','middleware' => ['permission:item-edit']]);

	Route::patch('itemCRUD2/{id}',['as'=>'itemCRUD2.update','uses'=>'ItemCRUD2Controller@update','middleware' => ['permission:item-edit']]);

	Route::delete('itemCRUD2/{id}',['as'=>'itemCRUD2.destroy','uses'=>'ItemCRUD2Controller@destroy','middleware' => ['permission:item-delete']]);

});