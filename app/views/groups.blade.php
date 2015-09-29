@extends('layout.MAIN-LAYOUT')
@section('content')
<div class="divider-divova"></div>
<div class="divider-divova"></div>
<div class="divider-divova"></div>

<div class="container">
<div class="row">

   
   <div id="listing-groups">
                    	<h2>GROUPS</h2>

    @foreach($groups as $grupa)
          <div class="group col-lg-4 well">
            <div class="home-section">
                <div class="group-title"><a href="group-{{$grupa->groupname}}">{{$grupa->groupname}}</a></div>
                <div class="inner-content">
                 <a href="profile-user-{{$grupa->getGroupCreator()}}">
                     <div class="notification-4">
                          <p>{{$grupa->getGroupCreator()}} </p>
                     </div>
                 </a>

                <p style="padding:39px">{{str_limit(Grouptopics::find(1)->message, $limit = 110, $end = '...')}}</p>

                </div>
                <div class="inner-content">
                 </div>
                <div class="inner-content"></div>
                <div class="row groups-footer">
                    <div class="col-lg-5">
                    	<h4 class="membernum">{{ $grupa->getMembersNumber()}} Members </h4>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5">
                        @if(Auth::user())
                    	<button  type="button" data-groupid="{{$grupa->id}}"  data-userid="{{Auth::user()->id}}" data-value="{{$grupa->buttonValue()}}" class="joinGroup btn btn-default btn-xs hidden-edit">{{$grupa->buttonValue()}}</button>
                        @else
                            <a href="/signin" type="button" class="btn btn-default btn-xs hidden-edit">Join</a>
                        @endif
                    </div>
                 </div>
            </div>
          </div>
@endforeach                
                
   </div>
    
    
   
</div>

  <div class="row"> 
  <div class="col-lg-4"></div>
  <div class="col-lg-4">
      {{ $groups[count($groups)-1]->id }}
  <span id="loadMore" class="btn btn-default align-center" data-last-id="{{ $groups[count($groups)-1]->id }}">LOAD MORE</span>
  </div>
  <div class="col-lg-4"></div>
  
  </div>
  <div class="divider-divova"></div>
</div>
{{ HTML::script('/js/user-interact/groups.js') }}
@stop
@include('layout.jqueryTemplates')