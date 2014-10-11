<?php

class AuthController extends Controller{

	public function getLogin(){
		return View::make('login');
	}

	public function postLogin(){
		$rule = array('username' => 'required', 'password'=>'required');
		$validator = Validator::make(Input::all(), $rule);

		if($validator->fails()){
			return Redirect::route('login')->withErrors($validator);
		}

		$auth = Auth::attempt(array(
			'name' => Input::get('username'),
			'password' => Input::get('password')
		), false);

		if(!$auth){
			return Redirect::route('login')->withErrors(array(
				'Invalid credential were provided'
			));
		}

		return Redirect::route('home');
	}

	public function getSignup(){

		return View::make('signup');
	}

	public function postSignup(){

		$rule = array('username' => 'required', 'password'=>'required');
		$validator = Validator::make(Input::all(), $rule);

		if($validator->fails()){
			return Redirect::route('signup')->withErrors($validator);
		}

		$user = new User;
		$user->name = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->email = 'example@example.com';
		$user->save();

		return Redirect::route('login');
	}

	public function getLogout(){

		Auth::logout();
		return Redirect::route('home');
	}
}