@extends('layout.MAIN-LAYOUT')

@section('content')

<!--/ row teget -->



<!--/ main text -->
<div class="divider-divova"></div>
<div class="divider-divova"></div>
<div class="divider-divova"></div>

<div class="container">


<!--GROUP -->
  <div class="col-lg-12 teget">
    <h2>{{$group->groupname}}</h2>
  </div>
   <div class="row">

     
     <div class="col-lg-12">
        <div class="row"> 
            <div class="col-lg-12 col-sm-12 col-xs-12 home-section">
              <div class="col-lg-2 col-sm-3 ">
                <div class=" profile-photo">
                  <img src="{{User::where('id', '=', $group->group_creator)->first()->image}}">
                </div>
              </div>
                <div class="col-lg-8 col-sm-6 col-xs-8">
                  
                </div>
                <div class="col-lg-2 col-sm-3 col-xs-4">
                  <div class="btn-group">
                    <button class="btn btn-default btn-md dropdown-toggle hidden-edit" type="button" data-toggle="dropdown">

                     <span class="glyphicon glyphicon-align-justify" style="text-shadow: 0 -1px 1px #999; color:#D8D8D8;"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Change cover</a></li>
                      <li><a href="#">Change user image</a></li>
                      <li><a href="#">Buy pro skill</a></li>
                    </ul>
                  </div>
                </div>
              </div> 
        </div>   
      </div>

  </div>
  <div class="row col-lg-12">
    <div class="well col-lg-6">
      <h3><strong>ABOUT CREATOR</strong></h3>
      <div class="col-lg-12 well">
        <h6><strong>Ime: </strong>{{User::where('id', '=', $group->group_creator)->first()->first_name}} </h6>
        <h6><strong>Prezime: </strong>{{User::where('id', '=', $group->group_creator)->first()->last_name}}</h6>
        <h6><strong>Role: </strong> pa broj</h6>
        <h6><strong>Number of Groups: </strong>{{Groupmembers::where('user_id', '=', $group->group_creator)->count()}}</h6>
        <h6><strong>About Him: </strong>{{User::where('id', '=', $group->group_creator)->first()->short_bio}}</h6>
        
      </div>
    </div>
    <div class="well col-lg-6">
      <h3><strong>ABOUT THIS GROUP</strong></h3>
      <div class="col-lg-12 well">
        <h6><strong>Created: </strong>{{$group->created_at}}</h6>
        <h6><strong>Type: </strong> jebem li ga</h6>
        <h6><strong>Members: </strong>{{Groupmembers::where('group_id', '=', $group->id)->count()}}</h6>
        <h6><strong>Owner: </strong> ime usera</h6>
        <h6><strong>Posts: </strong> pa broj</h6>
        <h6><strong>Created: </strong> pa datum</h6>
      </div>

    </div>
  </div>
     <div class="row">       
      
        <div class="col-lg-5 col-sm-5 col-xs-5">
                  <h3><strong>discussions</strong></h3>
                  <div class="clearfix well row hover-divs" onclick="location.reload();" style="cursor:pointer;">
                      
                      <div class="col-lg-4 col-sm-4 col-xs-5">
                        <a href=""><img class="friends-avatars-small" src="images/logo-footer.png" alt=""></a>
                        <a href="#">otvarac diskusije</a>
                      </div>
                      <div class="col-lg-7 col-sm-6 col-xs-5"> 
                        
                          <h4><a href="#">naziv diskusije</a></h4>
                        
                      </div>
                      <div class="col-lg-1 col-sm-2 col-xs-2">
                          <button type="button" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div> 
                      <div class="row col-lg-12 col-sm-12">
                          <span class="txt-messages">Ovde treba napraviti da se ispisuje samo pocetnih nekoliko reci od poruke i staviti tri tacke ...</span>
                      </div>
                  </div>



                  
                  

                  <div class="col-lg-12 well">
                      <a href="#"><span>load more...</span></a>
                  </div>

        </div>

      

      
        <div class="col-lg-7 col-sm-7 col-xs-7">
                  <h3><strong>NASLOV DISKUSIJE</strong></h3>
                  <div class="clearfix well row">
                      
                      <div class="col-lg-4 col-sm-4 col-xs-5">
                        <a href=""><img class="friends-avatars-big" src="images/logo-footer.png" alt=""></a>
                        <a href="#">otvarac diskusije</a>
                      </div>
                      <div class="col-lg-7 col-sm-6 col-xs-5"> 
                        
                          <h3><a href="#">naziv diskusije</a></h3>
                        
                      </div>
                      <div class="col-lg-1 col-sm-1 col-xs-1">
                          <button type="button" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div> 
                      <div class="row col-lg-12 col-sm-12">
                          <span class="txt-messages">kompletan text poruke ovde treba da se prikaziva :D</span>
                      </div>
                  </div>

                  
                  <div class="row well">
                    <form role="form">
                      <textarea class="form-control" style="width:100%;" rows="3" placeholder="Reply..."></textarea>
                    </form>
                    <div class="col-lg-4 col-sm-8 col-xs-8">
                      <button type="button" class="btn btn-primary btn-xs">
                        <span class="glyphicon glyphicon-paperclip"></span> Add file
                      </button>
                      <button type="button" class="btn btn-primary btn-xs">
                        <span class="glyphicon glyphicon-picture"></span> Add image
                      </button>
                    </div>
                    <div class="col-lg-4 col-sm-2 col-xs-2">
                      
                    </div>
                    <div class="col-lg-2 col-lg-offset-2 col-sm-2 ">
                      <button type="button" class="btn btn-default btn-xs">
                        <span> Send</span>
                      </button>
                    </div>
                  </div>
                  
                    
                  

        </div>

      

    </div> 
  </div> 
<!--END OF GROUP -->          


<!--/end main text -->
@stop