<!doctype html>
<head>
<link rel="shorcut icon" href="images/logo-footer.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Transport Connect</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/custom.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script language="JavaScript" src="{{ URL::asset('js/1.11.2jquery.min.js') }}"></script>
<script language="JavaScript" src="{{ URL::asset('js/user-interact/form-validation.js') }}"></script>
<script language="JavaScript" src="{{ URL::asset('js/user-interact/profileController.js') }}"></script> 
<script language="JavaScript" src="{{ URL::asset('js/user-interact/timeline.js') }}"></script>  

<link rel="stylesheet" href="css/carousel/style.css">
<link rel="stylesheet" href="css/carousel/jquery.jscrollpane.css">
<link rel="stylesheet" href="css/carousel/reset.css">
<script type="text/javascript" src="js/carousel/jquery.contentcarousel.js"></script>
<script type="text/javascript" src="js/carousel/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/carousel/jquery.mouse.wheel.js"></script> 
</head>
@include('layout.HEADER')
<div class="divider-divova"></div><div class="divider-divova"></div><div class="divider-divova"></div>
<div class="container">
<div class="row">
   <div class="col-lg-12">
   <h2 id="profile_name">{{$user->first_name}} {{$user->last_name}}</h2>
      <div class="row"> 
          <div class="col-lg-12 col-sm-12 col-xs-12 home-section" style="height:300px; overflow-x: hidden; overflow-y: hidden;">
                <div class="col-lg-2 col-sm-3 ">
                      <div class=" profile-photo"> 
                      <img src="images/profile/{{$user->image}}" width="150" height="150">            
                      </div>
                </div>
              <div class="col-lg-8 col-sm-6 col-xs-8">
              </div>
              <div class="col-lg-2 col-sm-3 col-xs-4">
                <h6 class="skill">SKILL: </h6>
                <h6 class="pro label label-danger">PRO</h6>
              </div>
              <img style="z-index:-1; width:100%; " src="images/timeline/{{Auth::user()->timeline_image}}"> 
            </div>
        </div>   
    </div>
        <!--/ social menu teget -->     
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
              <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>
            </div>  
          </div>
          <div class="row">
              <div class="col-lg-1"></div><div class="col-lg-2"></div><div class="col-lg-3"></div><div class="col-lg-3"></div><div class="col-lg-2"></div><div class="col-lg-1"></div>
          </div>
        </div>
               <!--/ end social menu teget -->
  
               <!--/skills -->      
      <div class="row">
      <div class="divider-divova"></div>
          	<!-- Nav tabs -->
            <div class="col-lg-4 well">
                <ul class="nav  nav-tabs" role="tablist">
                  <li class="active"><a href="#home" role="tab" data-toggle="tab">Bio</a></li>
                  <li><a href="#friend-profile" role="tab" data-toggle="tab">Friends</a></li>
                  <li><a href="#messages" role="tab" data-toggle="tab">Groups</a></li>
                </ul>
            <!-- Nav tabs -->
            <!-- Tab panes -->
                  <div class="tab-content">
                    <div class="tab-pane active" id="home">
                      	<div class="well col-lg-12">
                          <h4>{{$user->short_bio}}</h4>
                        </div>
                    </div>
                    <div class="tab-pane well clearfix" id="friend-profile">
                    @foreach (Friendships::where('user_id', '=', $user->id)->get()->slice(0,8) as $friend)
                      <div class="col-xs-3 col-md-3">
                        <a href="profile-user-{{$friend->getFriendName()}}" class="thumbnail">
                    	  <img src="images/profile/{{$friend->getFriendImage()}}" alt="">
                        </a>
                      </div>
                    @endforeach
                    </div>

                    <div class="tab-pane well clearfix" id="messages">
                      @foreach (Groupmembers::where('user_id', '=', $user->id)->get()->slice(0,8) as $list)
                      <div class="col-xs-3 col-md-3">
                        <a href="group-{{$list->getGroupName()}}" class="thumbnail">
                          <img src="images/thumb.jpg" alt="">
                        </a>
                      </div>
                      @endforeach
                    </div>

                  </div>
        		<!-- Tab panes -->
            </div>
           


            <div class="col-lg-4">
            	<div class="well">
                  <h3>
                    Photos
                  </h3>
              </div>
                
              <div class="row well">
                <div class="col-xs-3 col-md-3">
                  <a href="#" class="thumbnail">
                    <img src="images/thumb.jpg" alt="">
                  </a>
                </div>
                   
                  </div> 
            </div>
         
            <div class="col-lg-4">
          		<div class="well">
                  <h3>
                    Documents
                  </h3>  
              </div>
                @foreach(array_slice(File::allFiles('documents/did'.$user->id.'/'), 0, 6) as $doc)
                  <div class="row well">
                    <div class="col-xs-3 col-md-3">
                      <a href="#" class="thumbnail">
                        <img src="images/thumb.jpg" alt="">
                      </a>
                    </div> 
                  </div> 
                @endforeach
              </div>
            </div> 
      </div>
        <div class="divider-divova"></div>
          <!--/end  skills row -->
 
   		  <!--/Company profile -->
<div class="row">
  <div class="col-lg-12 teget">
    <h2>COMPANY PROFILE</h2>
  </div>
          <div class="divider-divova"></div><div class="divider-divova"></div><div class="divider-divova"></div>
            <div class="col-lg-6">          
		          <div class="well">
                <div class="container-contact">
                  <div class="row">
                 	  <div class="col-lg-12">
                      <form role="form">
                            <div class="form-group1">
                              <label for="InputEmail1">Email address</label>
                                <input type="email" class="form-control" id="InputEmail1" placeholder="Enter email">
                            </div>
                      </form>
                    </div>  
                  </div>   
                 
                      <div class="row">  
                            <div class="col-lg-6">
                                  <form role="form">
                                    <div class="form-group1">
                                      <label for="InputDot">DOT</label>
                                        <input type="text" class="form-control" id="InputDot" placeholder="DOT">
                                    </div>
                                  </form>
                            </div>
                        
                            <div class="col-lg-6">
                                  <form role="form">
                                    <div class="form-group1">
                                      <label for="InputMC">MC</label>
                                        <input type="text" class="form-control" id="Inputmc" placeholder="MC">
                                    </div>
                                  </form>
                            </div>  
                      </div>   
                 
                      <div class="row">
                            <div class="col-lg-6">
                                  <form role="form">
                                    <div class="form-group1">
                                      <label for="Inputff">FF</label>
                                        <input type="text" class="form-control" id="Inputff" placeholder="FF">
                                    </div>
                                  </form>
                            </div>
                              
                            <div class="col-lg-6">
                                  <form role="form">
                                    <div class="form-group1">
                                      <label for="Inputscac">SCAC code</label>
                                        <input type="text" class="form-control" id="Inputscac" placeholder="SCAC Code">
                                    </div>
                                  </form>
                            </div>
                      </div> 
                 
                      <div class="row">      
                     		<div class="col-lg-12">
                              <form role="form">
                                <div class="form-group1">
                                  <label for="InputtaxId">TAX ID</label>
                                    <input type="text" class="form-control" id="InputTaxId" placeholder="Tax ID">
                                </div>
                              </form>
                        </div> 
                      </div> 
                
                		<div class="row">
                            <div class="col-lg-12">
                                  <form role="form">
                                    <div class="form-group1">
                                      <label for="InputAuthority">Operating Authority</label>
                                        <input type="text" class="form-control" id="InputAuthority" placeholder="Operating Authority">
                                    </div>
                                  </form>
                         		   </div>  
                          </div>	
                      
                      
                      <div class="row">
                        <div class="col-lg-12">
                    	
                              <form role="form">
                                <div class="form-group1">
                                  <label for="Modesofservice">Modes of service</label>
                                    <textarea class="form-control" id="Modesofservice" rows="4"></textarea>
                                </div>
                              </form>
                            </div>  
                      </div>	
                      
                      <div class="row">
                        <div class="col-lg-12">
                    	
                              <form role="form">
                                <div class="form-group1">
                                  <label for="Areaofservice">Area of service</label>
                                    <textarea class="form-control" id="Areaofservice" rows="4"></textarea>
                                </div>
                              </form>
                      		  </div>  
                      </div>	 
                      
                      
                      <div class="row">
                        <div class="col-lg-12">
                              <form role="form">
                                <div class="form-group1">
                                  <label for="InputInsurance">Insurance Type</label>
                                    <input type="text" class="form-control" id="InsuranceType" placeholder="Insurance Type">
                                </div>
                              </form>
                        </div>  
                      </div>	
                      
                      
                  
                      <div class="row">
                        <div class="col-lg-12">
                              <form role="form">
                                <div class="form-group1">
                                  <label for="InsuranceAgents">Insurance Agents Info</label>
                                    <textarea class="form-control" id="InsuranceAgents" rows="4"></textarea>
                                </div>
                              </form>
                        </div>
                      </div>
                </div>

              </div>
            </div>
          
          
        <!--/accordion takozvana harmonika -->
 
            <div class="col-lg-6">
              <div class="well">
                <h4>LIST OF WORKERS BY DEPARTMENT</h4>
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background-color: #1C3341; color: #e8e8e8; text-align: center;" role="tab" id="headingOne">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Department one
                          </a>
                        </h4>
                      </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                           <p> <strong>John Doe</strong> <span class="label label-success">Online</span>
                              <p>Contact telehpone +12232342</p>
                                <a href="#">Invite to Chat </a></p>
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                      <div class="panel-heading" style="background-color: #1C3341; color: #e8e8e8; text-align: center;" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                             Department two
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                             <p> <strong>John Doe</strong>
                              <span class="label label-danger">Offline</span>
                                <p>Contact telehpone +12232342</p>
                                  <a href="#">Invite to Chat </a></p>
                        </div>
                      </div>
                  </div>

                  <div class="panel panel-default">
                      <div class="panel-heading" style="background-color: #1C3341; color: #e8e8e8; text-align: center;" role="tab" id="headingThree">
                          <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                             Department 3
                            </a>
                          </h4>
                      </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                                <p><strong>John Doe</strong>
                                  <span class="label label-danger">Offline</span>
                                    <p>Contact telehpone +12232342</p>
                                      <a href="#">Invite to Chat </a></p>
                          </div>
                        </div>
                  </div>
                <!--/info ispod -->

                  <div class="container-contact">  
                    <div class="row">
                            <div class="col-lg-6">
                            <form role="form">
                              <div class="form-group1">
                                <label for="Inputnumber">Number of drivers</label>
                                <input type="number" class="form-control" id="Inputnumber" placeholder="Number">
                              </div>
                            </form>
                             </div>  
                             
                             
                              <div class="col-lg-6">
                              
                                <form role="form">
                              <div class="form-group1">
                                <label for="Inputnumber">Company Drivers</label>
                                <input type="number" class="form-control" id="companydrivers" placeholder="Number">
                              </div>
                              </form>
                             </div>  
                    </div>     
                          <div class="row">
                            <div class="col-lg-12">
                              <form role="form">
                                <div class="form-group1">
                                  <label for="InsuranceAgents">Types of service</label>
                                    <textarea class="form-control" id="Typesofservice" rows="4"></textarea>
                                </div>
                              </form>
                            </div>
                          </div>
                                             
                          <div class="row">
                            <div class="col-lg-12">
                              <form role="form">
                                <div class="form-group1">
                                  <label for="haul">What do you haul?</label>
                                    <textarea class="form-control" id="haul" rows="4"></textarea>
                                </div>
                              </form>
                            </div>
                          </div> 
                      </div>
                    </div> 
                  </div>
            </div>
</div>
          <!--/end forms and stuffs -->

  <div class="row">
      <div class="col-lg-12 teget">
        <h2>REVIEWS</h2>
      </div>
  </div>                          
                      <div class="row">       
                        <div id="ca-container" class="ca-container">
                          <div class="ca-wrapper">
                            <div class="ca-item ca-item-1">
                                <div class="ca-item-main">
                                  <div class="ca-icon"></div>
                                    <h3>Stop factory farming</h3>
                                      <h4>
                                        <span class="ca-quote">“</span>
                                        <span>Some text...</span>
                                      </h4>
                                        <a href="#" class="ca-more">more...</a>
                           </div>
                                <div class="ca-content-wrapper">
                                  <div class="ca-content">
                                    <h6>Animals are not commodities</h6>
                                      <a href="#" class="ca-close">close</a>
                                        <div class="ca-content-text">
                                          <p>Some more text...</p>
                                        </div>
                                          <ul>
                                            <li><a href="#">Read more</a></li>
                                            <li><a href="#">Share this</a></li>
                                            <li><a href="#">Become a member</a></li>
                                            <li><a href="#">Donate</a></li>
                                          </ul>
                                  </div>
                                </div>
                            </div>



                            <div class="ca-item ca-item-2">
                                <div class="ca-item-main">
                                  <div class="ca-icon"></div>
                                    <h3>Stop factory farming</h3>
                                      <h4>
                                        <span class="ca-quote">“</span>
                                        <span>Some text...</span>
                                      </h4>
                                        <a href="#" class="ca-more">more...</a>
                                </div>
                                <div class="ca-content-wrapper">
                                  <div class="ca-content">
                                    <h6>Animals are not commodities</h6>
                                      <a href="#" class="ca-close">close</a>
                                        <div class="ca-content-text">
                                          <p>Some more text...</p>
                                        </div>
                                          <ul>
                                            <li><a href="#">Read more</a></li>
                                            <li><a href="#">Share this</a></li>
                                            <li><a href="#">Become a member</a></li>
                                            <li><a href="#">Donate</a></li>
                                          </ul>
                                  </div>
                                </div>
                            </div>



                          
                            <div class="ca-item ca-item-3">
                                <div class="ca-item-main">
                                  <div class="ca-icon"></div>
                                    <h3>Stop factory farming</h3>
                                      <h4>
                                        <span class="ca-quote">“</span>
                                        <span>Some text...</span>
                                      </h4>
                                        <a href="#" class="ca-more">more...</a>
                                </div>
                                <div class="ca-content-wrapper">
                                  <div class="ca-content">
                                    <h6>Animals are not commodities</h6>
                                      <a href="#" class="ca-close">close</a>
                                        <div class="ca-content-text">
                                          <p>Some more text...</p>
                                        </div>
                                          <ul>
                                            <li><a href="#">Read more</a></li>
                                            <li><a href="#">Share this</a></li>
                                            <li><a href="#">Become a member</a></li>
                                            <li><a href="#">Donate</a></li>
                                          </ul>
                                  </div>
                                </div>
                            </div>

     
                          </div><!-- ca-wrapper -->
                        </div><!-- ca-container --> 
                      </div>

  
</div>
<!--/end main text -->
<!--/foooooter -->    
<div class="row footer">
  <div class="col-lg-2"></div>
    <div class="col-lg-8">
       <div class="col-lg-4 footer-menu">
        <h4 style="text-align:center;">NAVIGATION</h4>

          <h5><a href="{{ URL::route('home')}}">Home</a></h5>
          <h5><a href="#">About us</a></h5>
          <h5><a href="{{ URL::route('members')}}">members</a></h5>
          <h5><a href="{{ URL::route('friends')}}">friends</a></h5>
          <h5><a href="{{ URL::route('groups')}}">groups</a></h5>
       
       </div>
  <div class="col-lg-4 footer-menu"> 
        <h4 style="text-align:center;">WEBSITE</h4>

        
          <h5><a href="#">Terms of use</a></h5>
          <h5><a href="#">Privacy</a></h5>
          <h5><a href="#">FAQ</a></h5>
       </div>
        <div class="col-lg-4 footer-logo"></div>
        
  </div>
    <div class="col-lg-2"></div>
    <div class="col-xs-12 all-rights"><h5>©2014 www.transport-connect All Rights Reserved</h5></div>
</div>
  

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
 
})
 
 $('#ca-container').contentcarousel({
    // speed for the sliding animation
    sliderSpeed     : 500,
    // easing for the sliding animation
    sliderEasing    : 'easeOutExpo',
    // speed for the item animation (open / close)
    itemSpeed       : 500,
    // easing for the item animation (open / close)
    itemEasing      : 'easeOutExpo',
    // number of items to scroll at a time
    scroll          : 1
});
</script>
</body>
</html>