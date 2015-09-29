@extends('layout.MAIN-LAYOUT')

@section('content')

<!--/ row teget -->



<!--/ main text -->
<div class="divider-divova"></div>
<div class="divider-divova"></div>
<div class="divider-divova"></div>

<div class="container">


<!--INBOX -->
  <div class="col-lg-12 teget">
    <h2>MY GROUPS</h2>
  </div>
     <div class="row">       
      
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

@foreach (Groupmembers::where('user_id', '=', Auth::user()->id)->get()->slice(0,6) as $list)

            <div class="col-lg-6 col-sm-6 col-xs-6 well">
               <a href="group-{{$list->getGroupName()}}"><h3 class="well" style="background-color:white;">{{$list->getGroupName()}}</h3>
                <img class="friends-avatars-big" src="images/logo-footer.png" alt=""></a>
                  <div class="col-lg-12 clearfix">
                    <div class="col-lg-6">
                      <button type="button" data-groupid="{{$list->group_id}}"  data-userid="{{Auth::user()->id}}" class="deletegroup btn btn-danger btn-xs hidden-edit">Delete group</button>
                    </div>  
                    <div class="col-lg-2 col-lg-offset-3">
                      <a href="group-{{$list->getGroupName()}}"><button  type="button" class="indGroup btn btn-default btn-xs hidden-edit">Go to group</button></a>
                    </div> 
                  </div>  
            </div>
          @endforeach
           
        
        </div>
                    
                  

      </div>

      

    </div> 
  </div> 
<!--END OF INBOX -->          
          
   


</div>

<!--/end main text -->
@stop