$('document').ready(function(){
    $('.btn1').click(function(){
        $('#single').css('display', 'inline');
        $('#double').css('display', 'none');
        $('html,body').delay(1000).animate({ scrollTop: $('.index_birth').offset().top }, 1000);
    });
    $('.btn2').click(function () {
        $('#single').css('display', 'none');
        $('#double').css('display', 'inline');
        $('html,body').delay(1000).animate({ scrollTop: $('.index_birth').offset().top }, 1000);
    });
    $('.btnM.submit').click(function () {
        $('.index_result').css('display', 'inline');
    });
    $('#top').click(function(){
        $('html,body').animate({ scrollTop: $('.index_choose').offset().top }, 1000);

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
    

