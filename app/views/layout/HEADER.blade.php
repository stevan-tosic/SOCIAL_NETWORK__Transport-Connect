<body>
<div class="row nav-bcgrnd navbar-fixed-top">
  <div class="col-lg-2 col-md-1"></div>
    <div class="col-lg-8 col-md-10">
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
          </div>        
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="{{ URL::route('home')}}">home</a></li>
              @if (Auth::check())            
              <li><a href="{{ URL::route('groups')}}">groups</a></li>
              <li><a href="{{ URL::route('friends')}}">friends</a></li>
              <li><a href="{{ URL::route('members')}}">members</a></li>                            
              <li><a href="{{URL::route('account-sign-out')}}">logout</a></li>
              @else
              <li id="login"><a href="#">login</a></li>
              @endif
            </ul>
              
            <ul class="nav navbar-nav navbar-right">
              <li class="form-group">
                <form class="navbar-form navbar-left" role="search">
                  <input type="text" class="form-control" placeholder="Search">
                </form>
              </li>
              @if (Auth::check())
                <li id="request" data-req="{{Friendrequests::where('req_reciever', '=', Auth::user()->id)->count()}}" class="notification-1">
                    <p>{{Friendrequests::where('req_reciever', '=', Auth::user()->id)->count()}}<br>Friendship requests</p>
                    <div id="request_from" style="width:400px; display:none;" >
                      @if(Friendrequests::where('req_reciever', '=', Auth::user()->id)->count())
@foreach(Friendrequests::where('req_reciever', '=', Auth::user()->id)->get() as $request)
                        <div class="well">
                           <a href="profile-user-{{$request->requestSender()->first()->username}}"><h6></h6>
                            <img class="friends-avatars" src="images/profile/{{$request->requestSender()->first()->image}}" alt="">{{$request->requestSender()->first()->first_name}} {{$request->requestSender()->first()->last_name}}</a>
                            <div class="clearfix">
                                <div class="col-lg-6">
                                  <button type="button" data-senderid="{{$request->requestSender()->first()->id}}"  data-userid="{{Auth::user()->id}}" data-value="Accept"  class="accept btn btn-danger btn-xs hidden-edit">Accept</button>
                                </div>  
                                <div class="col-lg-2 col-lg-offset-3">
                                  <button  type="button" data-senderid="{{$request->requestSender()->first()->id}}"  data-userid="{{Auth::user()->id}}" data-value="Deny request" class="deny indGroup btn btn-default btn-xs hidden-edit">Deny request</button>
                                </div> 
                              </div>  
                        </div>
@endforeach
@else
                        <div class="well">
                          NO MORE REQUESTS
                        </div>
@endif
                    </div>
                </li>
                <li id="inbox" class="notification-2">
                    <p>notifications</p>
                </li>
                <li id="profile" class="notification-3">
                    <p>{{Auth::user()->username}}</p>
                </li>
              @endif
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
      </nav>
    </div>
  <div class="col-lg-2 col-md-1"></div>
</div>

<!--/ end of header -->