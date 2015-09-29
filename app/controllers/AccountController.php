<?php
class AccountController extends BaseController {
	public function getSignIn() {
		if (Auth::check()) {
			return Redirect::route('home');
		} else {
			return View::make('account.signin');
		}
	}

	public function postSignIn()
	{
		$validator = Validator::make(Input::all(),
			array(
				'lusername' 			=> 'required',
				'lpassword'			=> 'required'
			)
		);
		if ($validator->fails())
		{
			return 	Redirect::route('account-sign-in')
					->withErrors($validator)
					->withInput();
		}
		else
		{
			$remember = (Input::has('remember')) ? true : false;
			$auth 	= Auth::attempt(array(
				'username' 	=> Input::get('lusername'), 
				'password'	=> Input::get('lpassword'),
				'active'	=> 1
			), $remember);

			if($auth)
			{
				// Redirect to the intended page
				return Redirect::intended('/');
			}
			else
			{
				return Redirect::route('account-sign-in')
					->with('global', 'Email/password combination wrong, or account not activated.');
			}
		}
	}

	public function getSignOut() {
		Auth::logout();
		return Redirect::route('home');
	}

	public function getCreate(){
		if (Auth::check()) {
			return Redirect::route('home');
		} else {
			return View::make('account.create');
		}
	}

	public function postCreate(){
		#print_r(Input::all());
		$validator = Validator::make(Input::all(),User::$validateRegister);
		if ($validator->fails()) {
			return 	Redirect::route('account-create')
					->withErrors($validator)
					->withInput();
		} else {

			$fName		= Input::get('fName');
			$lName 		= Input::get('lName');
			$email 		= Input::get('email');
			$username 	= Input::get('username');
			$password 	= Input::get('password');

			//Acctivation code
			$code 		= str_random(60);

			$user 	= User::create(array(
				'first_name'=> $fName,
				'last_name' => $lName,
				'email' 	=> $email, 
				'username'	=> $username,
				'password'	=> Hash::make($password),
				'code'		=> $code,
				'active'	=> 0
			));
			if ($user) {

				Mail::send('emails.auth.activate', array(
					'link' 		=> URL::route('account-activate', $code),
					'username' 	=> $username), 
				function($message) use ($user) {
					$message->to($user->email, $user->username)->subject('Activate your account');
				});

				return Redirect::route('home')
					->with('global', 'Your account has been created! We have been sent you an email to activate your account.<br /><br /><b>IMPORTANT:</b><br />
						YOUR ACCTIVATION MAIL MAY BE IN SPAM OR JUNK FOLDER');
			}			
		}
	}

		
	public function getActivate($code){
		$user = User::where('code', '=', $code)->where('active', '=', 0);
	if($user->count()) {
		$user = $user->first();

		// Update user at active state
		$user->active 	= 1;
		$user->code 	= '';

		if($user->save()) {
			return Redirect::route('home')
				->with('global', 'Activated! You can now sign in');
		}

		} else {

		return Redirect::route('home')
				->with('global', 'We could not activate your account. Try again later.' );
		}
	}
	public function getChangePassword()
	{
		return View::make('password');
	}
	public function postChangePassword()
	{
		$validator = Validator::make(Input::all(),
			array(
				'old_pass' 			=> 'required',
				'new_pass'			=> 'required|min:6',
				'new_pass_again'	=> 'required|same:new_pass'
				));

			if($validator->fails()) {
				//redirect
				return Redirect::route('account-change-password')
						->withErrors($validator);
			} else {
				//change password
				$user = User::find(Auth::user()->id);

				$old_pass = Input::get('old_pass');
				$password = Input::get('new_pass');

				if(Hash::check($old_pass, $user->getAuthPassword())){
					$user->password = Hash::make($password);

					if($user->save()) {
						return Redirect::route('home')
								->with('global', 'Your password has been changed.');
						} 
					} else {
						return Redirect::route('account-change-password')
								->with('global', 'Your old password is incorrect.' );
				}
			}

		return Redirect::route('account-change-password')
				->with('global', 'Your password could not be changed.' );
	}
}