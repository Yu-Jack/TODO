<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function getAuthIdentifier(){
		return $this->getKey();
	}

	/**
	 * 
	 *
	 * @return string
	 */
	public function getAuthPassword(){
		return $this->password;
	}

	/**
	 * 
	 *
	 * @return string
	 */
	public function getReminderEmail(){
		return $this->email;
	}

	public function items(){
		return $this->hasMany('Item', 'owner_id');
	}

}
