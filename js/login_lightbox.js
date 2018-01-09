$('document').ready(function(){
    $('.login-control').click(function () {
        $('.login_wrapper').css({
            'opacity': '1',
            'right': '0',
            'transition': 'opacity 0.2s'
        });
    });
    $('.login-close').click(function () {
        $('.login_wrapper').css({
            'opacity': '0.1',
            'right': '-100%'
        });
    });
    $('.register-control').click(function () {
        $('.register_wrapper').css({
            'opacity': '1',
            'right': '0',
            'transition': 'opacity 0.2s'
        });
    });
    $('.register-close').click(function () {
        $('.register_wrapper').css({
            'opacity': '0.1',
            'right': '-100%'
        });
    });
    $('.btnM.add').click(function () {
        $('.register_wrapper').css({
            'opacity': '1',
            'right': '0',
            'transition': 'opacity 0.2s'
        });
        $('.login_wrapper').css({
            'opacity': '0.1',
            'right': '-100%'
        });
    });
    $('.backBtn').click(function () {
        $('.register_wrapper').css({
            'opacity': '0.1',
            'right': '-100%'
        });
        $('.login_wrapper').css({
            'opacity': '1',
            'right': '0',
            'transition': 'opacity 0.2s'
        });
    });
});
