<?php

class Friendrequests extends Eloquent 
{
	protected $fillable = array('req_sender', 'req_reciever');

	public function requestSender()
	{
		return User::where('id', $this->req_sender)->get();
	}
}
