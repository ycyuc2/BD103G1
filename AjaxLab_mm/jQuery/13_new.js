$(function(){
	// var size = parseInt($('#names li').css('fontSize'));
	// console.log(size);
	$('#smallButton').click(function(){
		changeSize('small');
	});
	$('#bigButton').click(function(){
		changeSize('big');
	});



	function changeSize(size){
		var currentSize = parseInt($('#names li').css('fontSize'))

		if (size == 'small') {
			currentSize -= 1;
		}else if(size == 'big'){
			currentSize += 1;
		}
		$('#names li').css('fontSize', currentSize);
	}
});