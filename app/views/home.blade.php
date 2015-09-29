@extends('layout.MAIN-LAYOUT')

@section('content')
 </div>
</div>
    <div class="col-lg-12 col-xs-12 full-image">
    <div class="col-lg-8">
      
    </div>
<!--
  LOGIN FORM
-->
<div id="div1" style='height:950px'>
    @if(Session::has('global'))
    <div id="form_back">
        <div id="form"class="header-login col-lg-4 col-xs-12" >       
          <div class="row">
            <div class="col-lg-12">
              <div id="Succes_msg_reg" class="login-heading">
                   {{Session::get('global')}}
              </div> 
              <div class="row">
          <div class="col-lg-11 login-divider">
            <div class="col-lg-1">
               
            </div>
          </div>
        </div>

        <div>
      <div id="Succes_msg_log" class="login-heading">
        GOOD NEWS<br>YOU CAN LOG IN HERE!
      </div> 
          <form class="login-form" id="log_form" action="{{URL::route('account-sign-in')}}" method="post">

            <input id="logUsername" type="text" class="input-type" name="logUsername" placeholder="Username. . ."
            {{(Input::old('username')) ? 'value="'. Input::old('username') .'" ' : ''}} >
            @if($errors->has('logUsername'))
              {{ $errors->first('logUsername')}}
            @endif

            <input id="logPass" type="password" class="input-type" name="logPass" placeholder="Your Password. . ."
            {{(Input::old('logPass')) ? 'value="'. Input::old('logPass') .'" ' : ''}} >
            @if($errors->has('logPass'))
              {{ $errors->first('logPass')}}
            @endif

            <button style="margin: 15px 0px 0px 0px" type="submit" class="btn btn-default">LOGIN</button>
            <span style="color:red" class="logResponse"></span>
          {{Form::token() }}
          </form>
        </div>  
              
            </div>           
          </div>     
        </div>
    </div>
       
    @endif

</div>
    </div>
</div>
</nav> 
<div class="col-lg-12 teget"></div>

<div class="container">
<div class="row">
    <div class="col-lg-12">
      	<div class="col-lg-5 home-section">
        	<h4>Recent Activity</h4>
            <div class="col-xs-2">
               <div class="avatar-mali"></div>
            </div>
            <div class="col-xs-10">
               <h6>few words from users but not more than five users or group listed</h6>
            </div>
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-5 home-section" id="result">
        	<h4>Recent Groups</h4>
            <div class="col-xs-2">
               <div class="avatar-mali"></div>
            </div>
            <div class="col-xs-10">
               <h6>few words from users but not more than five users or group listed</h6>
            </div>
        </div>
        <div class="col-lg-12 timeline-text">
        	<h4>Recent Members</h4>
                <div class="col-xs-2">
                    <div class="avatar-mali"></div>
                </div>
                <div class="col-xs-2"></div>
                
        </div>
        <div class="col-lg-12">&nbsp;</div>        
    </div>
</div>
</div> 

  
<!--/end main text -->
@stop