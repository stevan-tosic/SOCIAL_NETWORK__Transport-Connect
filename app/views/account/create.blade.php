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
<div id="form_back">
<div id="form"class="header-login col-lg-4 col-xs-12" >       
  <div class="row">
    <div class="col-lg-12">
      <div id="Succes_msg_reg" class="login-heading">
          SIGN UP FOR FREE
      </div> 
      <div class="row">
        <div class="col-lg-1">                       
        </div>
        <div class="col-lg-11"> 
          <div id="response"> </div>            
          <form class="login-form" id="reg_form" action="{{URL::route('account-create-post')}}" method="post">
                        
            <span style="color:red" class="r-loading"></span>
            <span style="color:red" class="r-success"></span>

            <input id="fName" type="text" class="input-type" name="fName" placeholder="First name. . ."
            {{(Input::old('fName')) ? 'value="'. Input::old('fName') .'" ' : ''}} >
            @if($errors->has('fName'))
              {{ $errors->first('fName')}}
            @endif

            <input id="lName" type="text" class="input-type" name="lName" placeholder="Last name. . ."
            {{(Input::old('lName')) ? 'value="'. Input::old('lName') .'" ' : ''}} >
            @if($errors->has('lName'))
              {{ $errors->first('lName')}}
            @endif
            

            <input id="username" type="text" class="input-type" name="username" placeholder="Username. . ."
            {{(Input::old('username')) ? 'value="'. Input::old('username') .'" ' : ''}} >
            @if($errors->has('username'))
              {{ $errors->first('username')}}
            @endif
          

            <input id="email" type="text" class="input-type" name="email" placeholder="E-mail. . ."
            {{(Input::old('email')) ? 'value="'. Input::old('email') .'" ' : ''}} >
            @if($errors->has('email'))
              {{ $errors->first('email')}}
            @endif
            

            <input id="password" type="password" class="input-type" name="password" placeholder="Password. . ."
            {{(Input::old('password')) ? 'value="'. Input::old('password') .'" ' : ''}} >
            @if($errors->has('password'))
              {{ $errors->first('password')}}
            @endif
            

            <input id="pass_again" type="password" class="input-type" name="pass_again" placeholder="Repeat password . ."
            {{(Input::old('pass_again')) ? 'value="'. Input::old('pass_again') .'" ' : ''}} >
            @if($errors->has('pass_again'))
              {{ $errors->first('pass_again')}}
            @endif
           

            <button id="dugme"style="margin: 15px 0px 0px 0px" type="submit" class="btn btn-default">REGISTER</button>
            <span style="color:red" class="regResponse"></span>
            {{Form::token() }}
          </form>

                       
        <div class="row">
          <div class="col-lg-11 login-divider">
            <div class="col-lg-1">
               
            </div>
          </div>
        </div>

        <div>
      <div id="Succes_msg_log" class="login-heading">
        ALREADY A MEMBER? PLEASE LOGIN!
      </div> 
          <form class="login-form" id="log_form" action="{{URL::route('account-sign-in')}}" method="post">

            <input id="lusername" type="text" class="input-type" name="lusername" placeholder="Username. . ."
            {{(Input::old('lusername')) ? 'value="'. Input::old('lusername') .'" ' : ''}} >
            @if($errors->has('lusername'))
              {{ $errors->first('lusername')}}
            @endif

            <input id="lpassword" type="password" class="input-type" name="lpassword" placeholder="Your Password. . ."
            {{(Input::old('lpassword')) ? 'value="'. Input::old('lpassword') .'" ' : ''}} >
            @if($errors->has('lpassword'))
              {{ $errors->first('lpassword')}}
            @endif            

            <button style="margin: 15px 0px 0px 0px" type="submit" class="btn btn-default">LOGIN</button>
            <input style="color:white" type="checkbox" id="remember" name="remember">Remember me.</input>
            <span style="color:red" class="logResponse"></span>
          {{Form::token() }}
          </form>
        </div>               
        </div>
      </div>
    </div>           
  </div>     
</div>
</div>
