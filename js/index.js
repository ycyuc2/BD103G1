$('document').ready(function(){
    var controller= new ScrollMagic.Controller();

    var ourScene1= new ScrollMagic.Scene({
        triggerElement:'#section0',
        triggerHook:0.6,
        offset:'0vh'
    }).addIndicators({
        name:'h2',
        colorTrigger:'black',
        colorStart:'red',
        colorEnd:'blue'
    }).addTo(controller);

    // initialization();

    $('.circle').click(function(){
        $('#section2 .container h5').css({
            'height': '0',
            'opacity': '0'
        });
        $('#test').css({
            'display': 'block',
            'height': 'auto'
        });
       
    });

    $('.circle.c1').click(function () {
        
       
        $('.circle.c1').css('background','#003');
        $('.circle.c2').css('background','#000055');
        $('#single').css('display', 'inline');
        $('#double').css('display', 'none');
        $('html,body').animate({ scrollTop: $('#test').offset().top }, 1000);
    });
    $('.circle.c2').click(function () {
        $('.circle.c2').css('background', '#003');
        $('.circle.c1').css('background', '#000055');
        $('#test').css('display', 'block');
        $('#double').css('display', 'inline');
        $('#single').css('display', 'none');
        $('html,body').animate({ scrollTop: $('#test').offset().top }, 1000);
    });
    $('.btn.out.submit').click(function () {
        // $('#result').css('height', 'auto');
        $('html,body').animate({ scrollTop: $('#section3').offset('0').top }, 888);
    });
    //再次滑上來做算命時，點選方式會出現滑不下去的狀況
    //點選點算之跳到了算命結果，明明設定了，scrolloverflowreset但是超過100vh就會被切掉
});