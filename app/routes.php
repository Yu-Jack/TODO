<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



/*

* This a route bind model method

Route::bind('task', function($value, $route){
	return Item::Where('id', $value)->first();
});

*/

// it mean we set the route name ( uses )
Route::get('/',array('as' => 'home', 'uses' => 'HomeController@getIndex'))->before('auth');
Route::post('/',array('uses' => 'HomeController@postIndex'))->before('csrf');

Route::get('/new',array('as' => 'new', 'uses' => 'HomeController@getNew'));
Route::post('new',array('uses' => 'HomeController@postNew'))->before('csrf');

Route::get('/delete/{task}',array('as' => 'delete', 'uses' => 'HomeController@getDelete'));


Route::get('/login', array('as' => 'login', 'uses' => 'AuthController@getLogin'))->before('guest');
Route::post('login', array('uses' => 'AuthController@postLogin'))->before('csrf');

Route::get('/signup', array('as' => 'signup', 'uses' => 'AuthController@getSignup'))->before('guest');
Route::post('signup', array('uses' => 'AuthController@postSignup'))->before('csrf');

Route::get('/logout', array('as'=> 'logout', 'uses'=> 'AuthController@getLogout'));