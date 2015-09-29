<?php

class HomeController extends BaseController {
	public function home() 
	{
		return View::make('home');
	}

	public function groups()
	{
		$group = Groups::orderBy('id','desc')->take(3)->get();

		return View::make('groups')->with('groups', $group);
	}

	public function listMoreGroups($id)
	{
		$groups = Groups::where('id','<',$id)->orderBy('id','desc')->take(3)->get();
		$data = array();
		if(count($groups))
		{
			$i = 0;
			$user = Auth::user()? Auth::id():false;
			foreach($groups as $group)
			{
				$data[$i]['groupname'] = $group->groupname;
				$data[$i]['creator'] = $group->getGroupCreator();
				$data[$i]['description'] = str_limit($group->description,1,'...');
				$data[$i]['members'] = count($group->members);
				$data[$i]['button'] = $group->buttonValue();
				$data[$i]['id'] = $group->id;
				$i++;
			}
		}
		return json_encode(array('groups' => $groups, 'user' => $user));
	}

	public function indGroup() 
	{
		return View::make('individual-group');
	}

	public function friends()
	{
		if (Auth::check()) {
		$friend = Friendships::all();

		return View::make('friends')->with('friendships', $friend);
		} else {
			return Redirect::route('home')
				->with('global', 'You must to be loged in to see that page.');
		}
	}

	public function listGroups()
	{
		if (Auth::check()) {
		return View::make('list-groups');
		} else {
			return Redirect::route('home')
				->with('global', 'You must to be loged in to see that page.');
		}
	}
	public function members()
	{
		if (Auth::check()) {
		return View::make('members');
		} else {
			return Redirect::route('home')
				->with('global', 'You must to be loged in to see that page.');
		}
	}

	public function profile()
	{
		if (Auth::check()) {
		return View::make('profile');
		} else {
			return Redirect::route('home')
				->with('global', 'You must to be loged in to see that page.');
		}
	}

	public function inbox() 
	{
		if(Auth::check()) {
		return View::make('inbox');
		} else {
			return Redirect::route('home')
				->with('global', 'You must to be loged in to see that page.');
		}
	}
	public function timeline()
	{
		if(Auth::check()) {
		return View::make('timeline');
		} else {
			return Redirect::route('home')
				->with('global', 'You must to be loged in to see that page.');
		}
	}
	

}
