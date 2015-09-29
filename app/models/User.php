<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $fillable = array('first_name', 'last_name','username', 'email','password','password_temp', 'active', 'code', 'short_bio', 'skill');
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


	public static $validateRegister = array(
		'fName'			=> 'required|max:20',
		'lName'			=> 'required|max:20',
		'email' 		=> 'required|max:50|email|unique:users',
		'username'		=> 'required|max:20|min:3|unique:users',
		'password'		=> 'required|min:6',
		'pass_again'	=> 'required|same:password'
	);

	public function buttonValue()
	{
		$mid = $this->id;
		$uid = Auth::user()->id;

		$friend = Friendships::where('friend_id', '=', $mid)->where('user_id', '=', $uid)->count();
		$requested = Friendrequests::where('req_sender', '=', $uid)->where('req_reciever', '=', $mid)->count();
		if ($friend) {
			return "Friends";
		} else if ($requested) {
			return "Requested";
		} else {
			return "Send request";
		}
	}

}
