@extends('layout.MAIN-LAYOUT')

@section('content')

<div class="divider-divova"></div>
<div class="divider-divova"></div>
<div class="divider-divova"></div>

<div class="container">
	<div class="row">
<fieldset>
		<legend>Change Password</legend>

			<form class="form-horizontal" action="{{URL::route('account-change-password-post')}}" method="post">

				<div class="form-group">
						<label for="email" class="col-lg-2 control-label">Old password</label>
					<div class="col-lg-10">
						<input type="password"  class="form-control" name="old_pass" placeholder="Enter your old password. . ."
						{{(Input::old('old_pass')) ? 'value="'. Input::old('old_pass') .'" ' : ''}} >
						@if($errors->has('old_pass'))
							{{ $errors->first('old_pass')}}
						@endif
					</div>
				</div> <br>

				<div class="form-group">
						<label for="email" class="col-lg-2 control-label">New passsword</label>
					<div class="col-lg-10">
						<input type="password"  class="form-control" name="new_pass" placeholder="Enter your new password. . ."
						{{(Input::old('new_pass')) ? 'value="'. Input::old('new_pass') .'" ' : ''}} >
						@if($errors->has('new_pass'))
							{{ $errors->first('new_pass')}}
						@endif
					</div>
				</div> <br>

    			<div class="form-group">
      					<label for="password" class="col-lg-2 control-label">Retype password</label>
      			<div class="col-lg-10">
        				<input type="password" name="new_pass_again" id="new_pass_again" class="form-control" placeholder="Retype your new password. . .">
        				@if($errors->has('new_pass_again'))
							{{ $errors->first('new_pass_again')}}
						@endif
        			<div class="checkbox">
          				<label>
            			<input type="checkbox" id="checkbox" onchange="document.getElementById('new_pass_again').type = this.checked ? 'text' : 'password'">Show password.</input>
          				</label>
        			</div>
      			</div>
    			</div> <br>

				<div class="form-group">
	      			<div class="col-lg-10 col-lg-offset-2">
	        			<button type="reset" class="btn btn-default">Cancel</button>
	        			<button type="submit" class="btn btn-primary">Change password</button>
	      			</div>
	    		</div>
				{{Form::token() }}
			</form>

		</fieldset>

	</div>

</div>
<div class="divider-divova"></div>
<div class="divider-divova"></div>
<div class="divider-divova"></div>
@stop