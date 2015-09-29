<?php

class Groupmembers extends Eloquent 
{
	protected $fillable = array('user_id', 'group_id');
	
	public function getGroupName()
	{
		$id = Auth::user()->id;

		return Groups::where('id', $this->group_id)->first()->groupname;
	}

}

