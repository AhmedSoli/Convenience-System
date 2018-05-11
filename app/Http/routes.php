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



Route::auth();

Route::get('/', 'AdminController@index');
Route::get('/register', 'AdminController@register');
Route::post('register/admin','AdminController@store');
Route::delete('/admins/{User}/delete','AdminController@delete');
Route::patch('/admins/{User}/update','AdminController@update');

Route::post('/payments/store','PaymentsController@store');
Route::post('/payments/search','PaymentsController@search');
Route::get('/payments','PaymentsController@index');



Route::get('/transfer','TransactionsController@index');
Route::post('/transfer/search','TransactionsController@search');
Route::patch('transfer/add','TransactionsController@store');
Route::patch('transfer/substract','TransactionsController@store');
Route::patch('/consumers/transfer','TransactionsController@transfer_consumers');
Route::patch('admins/transfer','TransactionsController@transfer_admins');



Route::get('/consumers/{consumer}','ConsumerController@view');
Route::patch('consumers/{consumer}/add','ConsumerController@add');
Route::patch('consumers/{consumer}/substract','ConsumerController@substract');
Route::post('register/consumer','ConsumerController@store');
Route::patch('/consumers/{consumer}/deactivate','ConsumerController@deactivate');
Route::patch('/consumers/{consumer}/activate','ConsumerController@activate');
Route::patch('/consumers/{consumer}/update','ConsumerController@update');
Route::post('/consumers/search','ConsumerController@search');






Route::get('/products','ProductsController@view_all');
Route::get('/products/{product}/edit','ProductsController@edit');
Route::post('/products/store','ProductsController@store');
Route::patch('/products/{product}/update','ProductsController@update');
Route::post('/products/{product}/delete','ProductsController@destroy');
Route::get('/products/{product}','ProductsController@view_single');



Route::get('/app','AppController@index');
Route::get('/app/sign_in', 'AppController@sign_in');
Route::post('app/consumer', 'AppController@consumer');
Route::post('/app/{product}','AppController@buy');

