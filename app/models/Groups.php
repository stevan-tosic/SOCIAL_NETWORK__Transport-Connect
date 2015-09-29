<?php

class Groups extends Eloquent 
{
	public function user()
	{
		return $this->belongsTo('User','group_creator');
	}

	public function members()
	{
		return $this->hasMany('Groupmembers','group_id');
	}

	public function getGroupCreator()
	{
		return User::where('id', $this->group_creator)->first()->username;
	}

	public function getMembersNumber()
	{
			return Groupmembers::where('group_id', '=', $this->id)->count();
	}
	public function buttonValue()
	{
		$gid = $this->id;
		$uid = Auth::user()->id;

		$joined = Groupmembers::where('group_id', '=', $gid)->where('user_id', '=', $uid)->count();
		if ($joined) {
			return "Leave this group";
		} else {
			return "Join this group";
		}
	}


}
