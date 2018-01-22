$(function(){
	var divWidth = $('#slideBoard').width();
	var imgCount = $('#content li').length;

	$('#content').width(divWidth * imgCount);
	$('#content li').width(divWidth);

	for(var i=0; i<imgCount; i++){
		$('#contentButton').append('<li> </li>');
	}

	$('#contentButton li:nth-child(1)').addClass('clickMe');
	var index = 0;
	$('#contentButton li').click(function(){
		index = $(this).index();
		// alert(index);
		$('#content').animate({
			left: divWidth * index * -1
		});
		$(this).addClass('clickMe');
		$('#contentButton li').not(this).removeClass('clickMe');
	});
});