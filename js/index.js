$('document').ready(function(){
    $('.btn1').click(function(){
        $('#single').css('display', 'inline');
        $('#double').css('display', 'none');
        $('html,body').delay(1000).animate({ scrollTop: $('#start').offset().top }, 1000);
    });
    $('.btn2').click(function () {
        $('#single').css('display', 'none');
        $('#double').css('display', 'inline');
        $('html,body').delay(1000).animate({ scrollTop: $('#start').offset().top }, 1000);
    });
    $('.btn.out.submit').click(function () {
        $('#result').css('display', 'inline');
    });
    $('#top').click(function(){
        $('html,body').animate({ scrollTop: $('#choose').offset().top }, 1000);

    });
    $('#login .btn.add').click(function(){
        $('#add').css('display','inline');
        $('#login').css('display','none');
    });
    $('.backBtn').click(function () {
        $('#add').css('display', 'none');
        $('#login').css('display', 'inline');
    });
    
});
    

