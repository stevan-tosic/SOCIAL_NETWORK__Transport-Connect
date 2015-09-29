$(document).ready(function(){
	$('.deletefriend').click(function(){
    var friendid = $(this).attr('data-friendid');
    var usrid = $(this).attr('data-userid');
      $.post('/deletefriend',
        {
          uid:usrid,
          fid:friendid
        },
        function(status){
          location.reload();
        });
  });   

  $('#inbox').click(function(){
    location.href = '/inbox';
  });

  $('#profile').click(function(){
    location.href = '/timeline';
  });
 $('#request').click(function(){
    $('#request_from').show(900);
  });

$('.accept').click(function(){
      var sender = $(this).attr('data-senderid');
      var usrid = $(this).attr('data-userid');
      var value = $(this).attr('data-value');
      $(this).html("Accepted");
      $.post("/accept-friendship",
        {
          uid:usrid,
          sid:sender
        },
        function(){
          location.reload();
        });
    });
  $('.accept').mouseover(function(){
    var value = $(this).attr('data-value');
    if (value === "Accept"){
      $(this).html('Start the friendship');
      $('.accept').mouseout(function(){
        $(this).html(value);
      });
    } else if (value === "Accepted") {
      $(this).html('You are now friends');
      $('.sendrequest').mouseout(function(){
        $(this).html(value);
      });
    }
  });
$('.deny').click(function(){
      var sender = $(this).attr('data-senderid');
      var usrid = $(this).attr('data-userid');
      var value = $(this).attr('data-value');
      $(this).html("Denied")
      $.post("/deny-friendship",
        {
          uid:usrid,
          sid:sender
        },
        function(){
          location.reload();
        });
    });
$('.deny').mouseover(function(){
    var value = $(this).attr('data-value');
    if (value === "Deny request"){
      $(this).html('Ignore this request');
      $('.deny').mouseout(function(){
        $(this).html(value);
      });
    } 
  });

});

$(document).on('click', function(event){
  if(!$(event.target).closest('#request').length)
  {
    $('#request_from').hide(500);
  }
});

