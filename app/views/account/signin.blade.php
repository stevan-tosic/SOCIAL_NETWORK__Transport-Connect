<!doctype html>
<head>
<link rel="shorcut icon" href="images/logo-footer.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Transport Connect</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/custom.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script language="JavaScript" src="{{ URL::asset('../js/1.11.2jquery.min.js') }}"></script>
<script language="JavaScript" src="{{ URL::asset('../js/user-interact/form-validation.js') }}"></script>
<script language="JavaScript" src="{{ URL::asset('../js/user-interact/profileController.js') }}"></script> 
<script language="JavaScript" src="{{ URL::asset('../js/user-interact/timeline.js') }}"></script>  
</head>
@include('layout.HEADER')

<div class="divider-divova"></div>
<div class="divider-divova"></div>
<div class="divider-divova"></div>

<div class="container">
  <div class="row">
 <div id="Succes_msg_log" class="login-heading">
        ALREADY A MEMBER? PLEASE LOGIN!
        @if(Session::has('global'))
        <p>{{Session::get('global')}}</p>

        @endif
      </div> 
          <form class="login-form" id="log_form" action="{{URL::route('account-sign-in-post')}}" method="post">

            <input id="lusername" type="text" class="input-type" name="lusername" placeholder="Username. . ."
            {{(Input::old('lusername')) ? 'value="'. Input::old('lusername') .'" ' : ''}} >
            @if($errors->has('lusername'))
              {{ $errors->first('lusername')}}
            @endif
            <br>
            <input id="lpassword" type="password" class="input-type" name="lpassword" placeholder="Your Password. . ."
            {{(Input::old('lpassword')) ? 'value="'. Input::old('lpassword') .'" ' : ''}} >
            @if($errors->has('lpassword'))
              {{ $errors->first('lpassword')}}
            @endif
            <br>
              <input type="checkbox" id="remember" >Remember me.</input>
              <br>
            <button style="margin: 15px 0px 0px 0px" type="submit" class="btn btn-default">LOGIN</button>
            <span style="color:red" class="logResponse"></span>
          {{Form::token() }}
          </form>
  </div>

</div>
<div class="divider-divova"></div>
<div class="divider-divova"></div>
<div class="divider-divova"></div>
@include('layout.FOOTER')