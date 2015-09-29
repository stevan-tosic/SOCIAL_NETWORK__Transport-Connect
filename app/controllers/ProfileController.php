<?php
class ProfileController extends BaseController {
	public function coverImg()
	{
		return View::make('timeline.chng-cover');
	}

	public function allImgs()
	{
		return View::make('timeline.galery');
	}

	public function upImg()
	{
		return View::make('timeline.up-img');
	}

	public function chngProfImg()
	{
		$user_id	= $_POST['uid'];
		$prof_img	= $_POST['pimg'];

		$update = User::find($user_id);

		$update->image = $prof_img;

		$update->save();
	}

	public function user($username) 
	{
		$user = User::where('username', '=', $username);

		if ($user->count()) 
		{
			$user = $user->first();

			return View::make('profile')
					->with('user', $user);
		}
	}

	public function group($groupname)
	{
		$group = Groups::where('groupname', '=', $groupname);

		if ($group->count()) 
		{
			$group = $group->first();

			return View::make('individual-group')
					->with('group', $group);
		}
	}

	public function joinGroup()
	{
		$user_id	= $_POST['uid'];
		$group_id	= $_POST['gid'];
		$val 		= $_POST['val'];

		if ($val === "Join this group") {
			$join = Groupmembers::create(array(
				'user_id'	=> $user_id,
				'group_id'	=> $group_id
				));
			} else {
			$delete = Groupmembers::where('user_id', '=', $user_id)->where('group_id', '=', $group_id)->delete();
			}
	}

	public function deleteGroup()
	{
		$user_id	= $_POST['uid'];
		$group_id	= $_POST['gid'];

		$delete = Groupmembers::where('user_id', '=', $user_id)->where('group_id', '=', $group_id)->delete();
	}
	
	public function deleteFriend()
	{
		$user_id	= $_POST['uid'];
		$friend_id	= $_POST['fid'];

		$delete = Friendships::where('user_id', '=', $user_id)->where('friend_id', '=', $friend_id)->delete();
	}

	public function requestFriendship()
	{
		$user_id	= $_POST['uid'];
		$member_id	= $_POST['mid'];
		$val 		= $_POST['val'];

		if ($val === "Send request") {
			$request = Friendrequests::create(array(
				'req_sender'	=> $user_id,
				'req_reciever'	=> $member_id
				));
			} else if ($val === "Requested") {
				$cancel = Friendrequests::where('req_sender', '=', $user_id)->where('req_reciever', '=', $member_id)->delete();
			} else {
			$delete = Friendships::where('user_id', '=', $user_id)->where('friend_id', '=', $member_id)->delete();
			}
	}

	public function acceptFriendship()
	{
		$user_id	= $_POST['uid'];
		$sender_id	= $_POST['sid'];

		$accept = Friendships::create(array(
				'user_id'	=> $user_id,
				'friend_id'	=> $sender_id
				));

		if ($accept) {
			$delete = Friendrequests::where('req_sender', '=', $sender_id)->where('req_reciever', '=', $user_id)->delete();
		}
	}

	public function denyFriendship()
	{
		$user_id	= $_POST['uid'];
		$sender_id	= $_POST['sid'];

			$delete = Friendrequests::where('req_sender', '=', $sender_id)->where('req_reciever', '=', $user_id)->delete();
	}



	public function updateSkill() 
	{
		$user_id	= $_POST['uid'];
		$skill		= $_POST['s'];

		$update = User::find($user_id);

		$update->skill = $skill;

		$update->save();
		

	}

	public function updateBio()
	{
		$user_id	= $_POST['uid'];
		$bio		= $_POST['b'];

		$update = User::find($user_id);

		$update->short_bio = $bio;

		$update->save();

	}
	public function updateTimeline()
	{
		$user_id	= $_POST['uid'];
		$timeln		= $_POST['t'];

		$update = User::find($user_id);

		$update->timeline = $timeln;

		$update->save();
	}


		
	
}