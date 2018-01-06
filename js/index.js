$('document').ready(function(){
    $('.btn1').click(function(){
        $('#single').css('display', 'inline');
        $('#double').css('display', 'none');
        $('html,body').animate({ scrollTop: $('#start').offset().top }, 1000);
    });
    $('.btn2').click(function () {
        $('#single').css('display', 'none');
        $('#double').css('display', 'inline');
        $('html,body').animate({ scrollTop: $('#start').offset().top }, 1000);
    });
    $('.btn.out.submit').click(function () {
        $('#result').css('display', 'inline');
    });
    $('#top').click(function(){
        $('html,body').animate({ scrollTop: $('#choose').offset().top }, 1000);

    });
});
    

