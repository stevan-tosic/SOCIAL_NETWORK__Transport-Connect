@extends('layout.MAIN-LAYOUT')
@section('content')
<!--/ row teget -->
<!--/ main text -->
<div class="divider-divova"></div><div class="divider-divova"></div><div class="divider-divova"></div>
<div class="container">
  <div id="img-galery"></div>
  <div class="row">
    <div class="col-lg-12">
      <h2>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h2>
   	    <div class="row">	
          <div class="col-lg-12 col-sm-12 col-xs-12 home-section" style="height:300px; overflow-x: hidden; overflow-y: hidden;">
            <div class="col-lg-2 col-sm-3 ">
              <div class=" profile-photo">
                <img src="images/profile/{{Auth::user()->image}}" width="150" height="150"> 
              </div>
            </div>
            <div class="col-lg-8 col-sm-6 col-xs-8"></div>
            <div class="col-lg-2 col-sm-3 col-xs-4">
              <div class="btn-group">
                <button class="btn btn-default btn-md dropdown-toggle hidden-edit" type="button" data-toggle="dropdown">
                  <span class="glyphicon glyphicon-align-justify" style="text-shadow: 0 -1px 1px #999; color:#D8D8D8;"></span>
                </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a id="chng-cover-image" href="#">Change cover</a></li>
                    <li><a id="chng-profile-image" data-userid="{{Auth::id()}}"href="#">Change user image</a></li>
                    <li><a href="#">Buy pro skill</a></li>
                  </ul>
              </div>
                <h6 class="skill">SKILL: </h6>
                <h6 class="pro label label-danger">PRO</h6>
              </div>
             <img style="z-index:-1; width:100%;" src="images/timeline/{{Auth::user()->timeline_image}}"> 
            </div> 
        </div>   
    </div>       
  </div>
  <div class="row">
    <div class="col-lg-12 teget">
      <div class="col-lg-2 col-md-3 col-sm-4">
        <span class="social-teget">  number of likes </span>
        <span class="social-teget"> 5k </span>
        <span class="glyphicon glyphicon-thumbs-up"></span>
      </div>
      <div class="col-lg-8  col-md-6 col-sm-4 social-teget social-teget">
        <span class="glyphicon">social icons</span>
      </div>
      <div class="col-lg-2  col-md-3 col-sm-4 social-teget social-teget">
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star"></span>
      </div>  
    </div>
    <div class="row">
      	<div class="col-lg-1"></div>
      	<div class="col-lg-2"></div>
        <div class="col-lg-3"></div><div class="col-lg-3"></div>
        <div class="col-lg-2"></div>
        <div class="col-lg-1"></div>             
    </div>
		</div>
<div class="divider-divova"></div>
<div class="row">
  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <div class="row well">
      <div class="col-lg-4">
        <h4>skills</h4>
      </div>
      <div class="col-lg-6"></div>
      <div class="col-lg-2">
        <a class="hidden-edit" data-toogle="skils">edit</a>
      </div>
    </div>
      <p class="well" id="skils-desc">{{Auth::user()->skill}}
      </p>
      <div id="skils-edit" style="display:none">
          <textarea class="form-control" name="" id="skill"  cols="30" rows="5">{{Auth::user()->skill}}</textarea>
          <button id="skill-save" data-userid="{{Auth::user()->id}}" class="btn btn-success">Save</button>
      </div>
  </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <div class="row well">
    <div class="col-lg-4">
      <h4>my biography</h4>
    </div>
    <div class="col-lg-6"></div>
    <div class="col-lg-2">
      <a class="hidden-edit" data-toogle="bio">edit</a>
    </div>
  </div>
      <p class="well" id="bio-desc"> {{Auth::user()->short_bio}}
      </p>
      <div id="bio-edit" style="display:none">
        <form id="short_bio">
          <textarea class="form-control" name="" id="bio"  cols="30" rows="5">{{Auth::user()->short_bio}}</textarea>
          <button type="submit" id="bio-save" data-userid="{{Auth::user()->id}}" class="btn btn-success">Save</button>
        </form>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <div class="row well">
    <div class="col-lg-3">
      <h4>my friends</h4>
    </div>
    <div class="col-lg-7"></div>
    <div class="col-lg-2">
      <a class="hidden-edit" href="{{ URL::route('friends')}}">see all</a>
    </div>
  </div>
  @foreach (Friendships::where('user_id', '=', Auth::user()->id)->get()->slice(0,6) as $friend)
            <div class="col-lg-2 col-sm-2 col-xs-2 well">
               <a href="profile-user-{{$friend->getFriendName()}}"><h6>{{$friend->getFriendName()}}</h6>
                <img class="friends-avatars" src="images/profile/{{$friend->getFriendImage()}}" alt=""></a>
            </div>
  @endforeach
  </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <div class="row well">
      <div class="col-lg-3">
        <h4>my groups</h4>
      </div>
    <div class="col-lg-7"></div>
    <div class="col-lg-2">
      <a class="hidden-edit" href="{{ URL::route('list-groups')}}">see all</a>
    </div>  
  </div>
    <div class="row">
      @foreach (Groupmembers::where('user_id', '=', Auth::user()->id)->get()->slice(0,6) as $list)
      <div class="col-lg-2 col-sm-2 col-xs-2 well">
         <a href="group-{{$list->getGroupName()}}"><h6>{{$list->getGroupName()}}</h6>
          <img class="friends-avatars" src="images/logo-footer.png" alt=""></a>
      </div>
      @endforeach
    </div>  
  </div>
</div>
<div class="divider-divova"></div>
        <div class="col-lg-12">
          <div class="col-lg-12 col-sm-12 col-xs-12 well">
           <h4>my photo gallery</h4>
            <div class="col-lg-offset-10 col-sm-offset-9 col-xs-offset-8 col-lg-3 col-sm-3 col-xs-4 hidden-edit" style="font-size:12px;">
              <a href="#">add more photos </a>&nbsp;&nbsp;
              <a id="see-all-imgs" href="#">see all</a>
            </div>
            <div class="row">
              @foreach(array_slice(File::allFiles('images/profile'), 0, 6) as $img)
                <div class="col-sm-4 col-md-3 col-lg-2">
                  <a href="{{$img}}" class="thumbnail">
                    <img class="photo-gallery-thumbs" src="{{$img}}" alt="">
                  </a>
                </div>
              @endforeach
            </div>
          </div>  
        </div>
<!--DOCUMENTS -->           
      <div class="row">
        <h3>DOCUMENTS</h3>
        <div id="upld-file"></div>
          <div class="col-lg-1">            
          </div>
          <div class="col-lg-3 col-sm-5" style="text-align:center;">
            <a href="#"><h3 class="label label-danger">view all docs</h3></a>
          </div>
          <div class="col-lg-4 col-sm-2">           
          </div>
          <div class="col-lg-3 col-sm-5" style="text-align:center;">
            <a id="upld-new" ><h3 class="label label-danger">upload new</h3></a>
          </div>
          <div class="col-lg-1">           
          </div>
      </div>
      <div class="row">          
          <div  class="col-lg-1">           
          </div>
          <div style="border-top: 1px dashed" class="col-lg-10 col-sm-12 well">
            <div class="row">
@foreach(array_slice(File::allFiles('documents/did'.Auth::id().'/'), 0, 6) as $doc)
                <div class="col-sm-4 col-md-3 col-lg-2">
                  <a href="{{$doc}}" class="thumbnail">
                    <img class="photo-gallery-thumbs" src="images/doc-icons/{{File::fileExtImage($doc)}}.png" alt="">
                  </a>
                </div>
@endforeach              
            </div>
          </div>
          <div class="col-lg-1"></div>
      </div>
  <div class="row">   
   	<div class="col-lg-12 teget">
      <h2>TIMELINE</h2>
    </div>        
        <div class="row">   
            <div class="divider-divova"></div>
            <div class="col-lg-1 col-sm-1"></div>
            <div class="col-lg-10 col-sm-10 well">
              <h5>{{Auth::user()->timeline}}</h5>
            </div>
            <div class="col-lg-1 col-sm-1 col-xs-1">
              <span class="hidden-edit" data-toogle="timeln"><a>edit</a></span>
            </div>
            <div id="timeln-edit" style="display:none">
              <form id="timeline">
                <textarea class="form-control" name="" id="timeln"  cols="30" rows="5" placeholder="What are you thinkig about. . ."></textarea>
                <button type="submit" id="timeln-save" data-userid="{{Auth::user()->id}}" class="btn btn-success">Save</button>
              </form>
      </div>
        </div>       
        <div class="row">         
          <div class="col-lg-6 col-sm-6">
              <div class="row well">     
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <a href=""><img class="friends-avatars-big" src="images/logo-footer.png" alt=""></a>
                  </div>
                  <div class=" col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-9 col-md-9 col-sm-9 col-xs-9"> 
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                      <a href="#">users name or nickname</a>
                    </div>
                    <div class="col-lg-1 col-sm-1 col-xs-1">
                      <span style="color:red;" class="glyphicon glyphicon-remove hidden-edit"><a href="#"></a></span>
                    </div> 
                    <span class="txt-messages">
                      Ovde treba napraviti da se ispisuje samo pocetnih nekoliko reci od poruke i staviti tri tacke ...
                    </span>
                  </div>
              </div>
              <div class="col-lg-12 well">
                <a href="#"><span>load more</span></a>
              </div> 
          </div>
        <!--POCETAK CHATA -->
          <div class="col-lg-6 col-sm-6">
              <div class="row well">        
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <a href=""><img class="friends-avatars-big" src="images/logo-footer.png" alt=""></a>
                  </div>
                  <div class=" col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-9 col-md-9 col-sm-9 col-xs-9"> 
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                      <a href="#">users name or nickname</a>
                    </div>
                    <div class="col-lg-1 col-sm-1 col-xs-1">
                      <span style="color:red;" class="glyphicon glyphicon-remove hidden-edit"><a href="#"></a></span>
                    </div> 
                    <span class="txt-messages">
                      Ovde treba napraviti da se ispisuje samo pocetnih nekoliko reci od poruke i staviti tri tacke ...
                    </span>
                  </div>
              </div>
              <div class="col-lg-12 well">
                <a href="#"><span>load more</span></a>
              </div> 
          </div>
        </div>
        <!-- END OF CHAT -->
  </div> 
<!-- END OF TIMELINE -->   

<!--ACTIVITY -->
  <div class="col-lg-12 teget">
    <h2>ACTIVITY</h2>
  </div>
 <div class="row">       
  <div class="clearfix">
    		  	<div class="col-lg-6">
              <h3>inbox</h3>
    @foreach (Messages::where('reciever', '=', Auth::user()->id)->get() as $msg)
              <div class="row well">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <a href=""><img class="friends-avatars-big" src="images/profile/{{User::where('id', '=', $msg->sender)->first()->image}}" alt=""></a>
                  </div>
                  <div class=" col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-9 col-md-9 col-sm-9 col-xs-9"> 
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                      <a href="profile-user-{{User::where('id', '=', $msg->sender)->first()->username}}">{{User::where('id', '=', $msg->sender)->first()->username}}</a>
                    </div>
                    <div class="col-lg-1 col-sm-1 col-xs-1">
                      <span style="color:red;" class="glyphicon glyphicon-remove hidden-edit"><a href="#"></a></span>
                    </div> 
                    <span class="txt-messages"> {{str_limit($msg->message, $limit = 120, $end = '...')}} </span>
                  </div>
              </div>
    @endforeach
              <div class="col-lg-12 well">
                  <a href="{{ URL::route('inbox')}}"><span>go to inbox</span></a>
              </div>
            </div>
  <div class="clearfix">
            <div class="col-lg-6">
            <h3>friends actions</h3>
              <div class="row well">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <a href=""><img class="friends-avatars-big" src="images/logo-footer.png" alt=""></a>
                  </div>
                  <div class=" col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-9 col-md-9 col-sm-9 col-xs-9"> 
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                      <a href="#">users name or nickname</a>
                    </div>
                    <div class="col-lg-1 col-sm-1 col-xs-1">
                      <span style="color:red;" class="glyphicon glyphicon-remove hidden-edit"><a href="#"></a></span>
                    </div> 
                    <span class="txt-messages">
                      Ovde treba napraviti da se ispisuje samo pocetnih nekoliko reci od poruke i staviti tri tacke ...
                    </span>
                  </div>
              </div>
              <div class="col-lg-12 well">
                  <a href="#"><span>go to friends actions</span></a>
              </div>
            </div>
  </div>
</div>  
<!--END OF ACTIVITY -->          
<!--REVIEWS -->   
  <div class="col-lg-12 col-sm-12 teget">
    <h2>REVIEWS</h2>
  </div>
  <div class="row">
    <div class="divider-divova"></div>
      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="thumbnail">
          <a href=""><img class="photo-gallery-thumbs" src="images/logo-footer.png" alt=""></a>
          <div class="caption">
              <h3>users name</h3>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
              </p>
          </div>
        </div>
      </div>

      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="thumbnail">
          <a href=""><img class="photo-gallery-thumbs" src="images/logo-footer.png" alt=""></a>
          <div class="caption">
              <h3>users name</h3>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
              </p>
          </div>
        </div>
      </div>

      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="thumbnail">
          <a href=""><img class="photo-gallery-thumbs" src="images/logo-footer.png" alt=""></a>
          <div class="caption">
              <h3>users name</h3>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
                <span class="glyphicon glyphicon-star" style="color:orange;"></span>
              </p>
          </div>
        </div>
      </div>
          
  </div>
<!--END OF REVIEWS -->
</div>
</div>
<!--/end main text -->
@stop