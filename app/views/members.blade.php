@extends('layout.MAIN-LAYOUT')

@section('content')
<!--/ main text -->
<div class="divider-divova"></div>
<div class="divider-divova"></div>
<div class="divider-divova"></div>

<div class="container">


<!--INBOX -->
  <div class="col-lg-12 teget">
    <h2>MEMBERS</h2>
  </div>
     <div class="row">       
      
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

@foreach (User::all() as $member)
            <div class="col-lg-6 col-sm-6 col-xs-6 well">
               <a href="profile-user-{{$member->username}}"><h3 class="well" style="background-color:white;">{{$member->username}}</h3>
                <img class="friends-avatars-big" src="images/profile/{{$member->image}}" alt=""></a>
                  <div class="col-lg-12 clearfix">
                    <div class="col-lg-6">
                      <button type="button"  data-memberid="{{$member->id}}"  data-userid="{{Auth::user()->id}}" data-value="{{$member->buttonValue()}}" class="sendrequest btn btn-danger btn-xs hidden-edit">{{$member->buttonValue()}}</button>
                    </div>  
                    <div class="col-lg-2 col-lg-offset-3">
                      <button type="button"  class="btn btn-default btn-xs hidden-edit">Send message</button>
                    </div> 
                  </div>  
            </div>
@endforeach   
            </div>
        </div>
      </div> 
    </div> 
  </div> 
<!--END OF INBOX -->          
          
   


</div>

{{ HTML::script('/js/user-interact/members.js') }}
@stop