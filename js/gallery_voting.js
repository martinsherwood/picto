$(function(){
	$("a.vote_up").click(function(){ 
	//get the id
	the_id = $(this).attr('name');
	
	//show the spinner
	$(this).parent().html("<img src='./images/misc/spinner.gif'/>");
	
	//fadeout the vote-count 
	$("span#votes_count"+the_id).fadeOut("fast");
	
	//main ajax request
		$.ajax({
			type: "POST",
			data: "action=vote_up&id="+$(this).attr("name"),
			url: "./functions/votes.php",
			success: function(msg)
			{
				$("span#votes_count"+the_id).fadeOut();
				$("span#votes_count"+the_id).html(msg);
				$("span#votes_count"+the_id).fadeIn();
				$("span#vote_buttons"+the_id).remove();
			}
		});
	});
	
	$("a.vote_down").click(function(){ 
	//get the id
	the_id = $(this).attr('name');
	
	//show the spinner
	$(this).parent().html("<img src='./images/misc/spinner.gif'/>");
	
	//main ajax request
		$.ajax({
			type: "POST",
			data: "action=vote_down&id="+$(this).attr("name"),
			url: "./functions/votes.php",
			success: function(msg)
			{
				$("span#votes_count"+the_id).fadeOut();
				$("span#votes_count"+the_id).html(msg);
				$("span#votes_count"+the_id).fadeIn();
				$("span#vote_buttons"+the_id).remove();
			}
		});
	});
});	