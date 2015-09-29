
var groups = {
	init: function(){
/*
		$('.group').hide().slice(0,6).show();
*/
		$('#loadMore').click(function(){
			var lastGroupId = $(this).data('last-id');
			var container = $('#listing-groups');
			var template = $('#group-templates').html();
			var userBtn;
			$.ajax({
				url: '/list-more-groups/'+lastGroupId,
				type: 'post',
				dataType: 'json',
				beforeSend: function(){
					$.blockUI();
				},
				complete: function(){
					$.unblockUI();
				},
				success: function(data){
					if(data.groups.length > 0){
						$(data.groups).each(function(i,val){
							if(data.user){
								userBtn = '<button  type="button" data-groupid="'+val.id+'"  data-userid="'+data.user+'" data-value="'+val.button+'" class="joinGroup btn btn-default btn-xs hidden-edit">'+val.button+'</button>';
							}
							else{
								userBtn = '<a href="/signin" type="button" class="btn btn-default btn-xs hidden-edit">Join</a>';
							}

							container.append(template.format(val.groupname,val.creator,val.description,val.members,userBtn))
						});
					}
				}
			});
/*
			if ($('#loadMore').text() === "LOAD MORE") {
				$('.group').show();
				$('#loadMore').html('SHOW LESS');
			} else {
				$('.group').hide().slice(0,6).show();
				$('#loadMore').html('LOAD MORE');
			}
*/
		});

		$('.joinGroup').click(function(){
			var groupid = $(this).attr('data-groupid');
			var usrid = $(this).attr('data-userid');
			var value = $(this).attr('data-value');
			$.post("/join-group",
				{
					uid:usrid,
					gid:groupid,
					val:value
				},
				function(status){
					location.reload();
				});
		});

		$('.deletegroup').click(function(){
			var groupid = $(this).attr('data-groupid');
			var usrid = $(this).attr('data-userid');
			$.post("/delete-group",
				{
					uid:usrid,
					gid:groupid
				},
				function(status){
					location.reload();
				});
		});
	}
};
$(document).ready(function(){
	groups.init();
});