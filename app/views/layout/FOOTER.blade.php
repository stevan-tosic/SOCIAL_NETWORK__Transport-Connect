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
{{ HTML::script('js/main.js') }}
{{ HTML::script('js/block-ui.js') }}
</body>
</html>