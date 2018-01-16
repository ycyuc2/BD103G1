$('document').ready(function(){
    $('.btn1').click(function(){
        $('#single').css('display', 'inline');
        $('#double').css('display', 'none');
        $('html,body').animate({ scrollTop: $('.index_birth').offset().top }, 1000);
    });
    $('.btn2').click(function () {
        $('#single').css('display', 'none');
        $('#double').css('display', 'inline');
        $('html,body').animate({ scrollTop: $('.index_birth').offset().top }, 1000);
    });
    $('.btnM.submit').click(function () {
        $('.index_result').css('display', 'inline');
    });
    
});
    

