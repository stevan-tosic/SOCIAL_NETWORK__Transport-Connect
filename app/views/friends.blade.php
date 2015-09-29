@extends('layout.MAIN-LAYOUT')

@section('content')
<!--/ main text -->
<div class="divider-divova"></div>
<div class="divider-divova"></div>
<div class="divider-divova"></div>

<div class="container">


<!--INBOX -->
  <div class="col-lg-12 teget">
    <h2>FRIENDS</h2>
  </div>
     <div class="row">       
      
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

@foreach (Friendships::where('user_id', '=', Auth::user()->id)->get() as $friend)
            <div class="col-lg-6 col-sm-6 col-xs-6 well">
               <a href="profile-user-{{$friend->getFriendName()}}"><h3 class="well" style="background-color:white;">{{$friend->getFriendName()}}</h3>
                <img class="friends-avatars-big" src="images/profile/{{$friend->getFriendImage()}}" alt=""></a>
                  <div class="col-lg-12 clearfix">
                    <div class="col-lg-6">
                      <button type="button" data-friendid="{{$friend->friend_id}}"  data-userid="{{Auth::user()->id}}" class="deletefriend btn btn-danger btn-xs hidden-edit">Delete friend</button>
                    </div>  
                    <div class="col-lg-2 col-lg-offset-3">
                      <button type="button" data-friendid="{{$friend->id}}"  data-userid="{{Auth::user()->id}}" class="btn btn-default btn-xs hidden-edit">Send message</button>
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

<!--/end main text -->
@stop