$(document).ready(function(){


	$('#see-all-imgs').click(function(){
		$('#img-galery').load('/all-imgs');
	});

	$('#chng-cover-image').click(function(){
		window.alert("kliknuto");
		$('#img-galery').load('/chng-cover');
	});

	$('#chng-profile-image').click(function(){
		var usrid = $(this).data('userid');
		$('#img-galery').load('/up-img', function(){
			$('img').on('click', function() {
				var img = $(this).attr('src').split('/').pop(); 
				$.post("/chng-profile-image",
					{
						uid:usrid,
						pimg:img
					},
				function(status){
						location.reload();
					});
			});
		});
	});
	$('#skill-save').click(function(){
		var usrid = $(this).attr('data-userid');
		var skill = $('#skill').val();
		$.post("/update-skill",
			{
				uid:usrid,
				s:skill
			},
			function(status){
					location.reload();
				});

	});

	$('#bio-save').click(function(){
		var usrid = $(this).attr('data-userid');
		var bio = $('#bio').val();
		$.post("/update-bio",
			{
				uid:usrid,
				b:bio
			},
			function(status){
					location.reload();
				});
	});
	$('#timeln-save').click(function(){
		var usrid = $(this).attr('data-userid');
		var timeln = $('#timeln').val();
		$.post("/update-timeln",
			{
				uid:usrid,
				t:timeln
			},
			function(status){
				location.reload();
			});
	});

	$('#upld-new').click(function(){
		$('#upld-file').load('/file-upload', function(){

		}); 
	});

});

$(document).on('click','.hidden-edit',function(){
            var id = $(this).data('toogle');
            $('#'+id+'-desc').toggle(200);
            $('#'+id+'-edit').toggle(200);
});

