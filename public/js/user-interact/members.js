$(document).ready(function(){
	$('.sendrequest').click(function(){
			var memberid = $(this).attr('data-memberid');
			var usrid = $(this).attr('data-userid');
			var value = $(this).attr('data-value');
			$.post("/request-friendship",
				{
					uid:usrid,
					mid:memberid,
					val:value
				},
				function(status){
					location.reload();
				});
		});
	$('.sendrequest').mouseover(function(){
		var value = $(this).attr('data-value');
		if (value === "Requested"){
			$(this).html('Cancel');
			$('.sendrequest').mouseout(function(){
				$(this).html(value);
			});
		} else if (value === "Friends") {
			$(this).html('Delete friend');
			$('.sendrequest').mouseout(function(){
				$(this).html(value);
			});
		}
	});

	

});