$(document).ready(function(){
	$('form.msg-send-friends').on('submit', function(e){
		e.preventDefault();
		var uid	= $(this).data('userid');
		var recid = $(this).data('friendid');
 		var msg = $('#msg-text').val();

        	window.alert(msg+uid+recid);
        $.post('/msg-send',
        	{
        		uid:uid,
        		rid:recid,
        		msg:msg
        	}, function(status){
        		location.reload();
        	});
	});
});