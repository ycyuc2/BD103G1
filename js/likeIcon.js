$(document).ready(function(){
	var $likeCount    = 0;
	var $dislikeCount = 0;

	$('#like-num').html($likeCount);
	$('#dislike-num').html($dislikeCount);

	$('.like').click(function(){
	  $likeCount++;
	  $('#like-num').html($likeCount);
	});

	$('.dislike').click(function(){
	  $dislikeCount++;
	  $('#dislike-num').html($dislikeCount);
	});
});