<?php

class Friendships extends Eloquent 
{
	protected $fillable = array('user_id', 'friend_id');

	public function getFriendName()
	{
		$id = Auth::user()->id;

		return User::where('id', $this->friend_id)->first()->username;
	}
	public function getFriendImage()
	{
		return User::where('id', $this->friend_id)->first()->image;
	}

	


}
