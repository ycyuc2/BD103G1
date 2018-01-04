$('document').ready(function(){
    var controller= new ScrollMagic.Controller();

    var ourScene1= new ScrollMagic.Scene({
        triggerElement:'#section0',
        triggerHook:0.6,
        offset:'0vh'
    // .addIndicators({
    //     name:'h2',
    //     colorTrigger:'black',
    //     colorStart:'red',
    //     colorEnd:'blue'
    }).addTo(controller);

    $('.clear').each(function () {


        var ourScene3 = new ScrollMagic.Scene({
            triggerElement: this.children[0],
            triggerHook: 0,
            offset: '130vh'
        })
            .setClassToggle(this, 'disap') // add class to project01
            // .addIndicators({
            //     name: 'clear',
            //     colorTrigger: 'black',
            //     colorStart: '#75C695',
            //     colorEnd: 'pink'
            // }) // this requires a plugin
            .addTo(controller);

    });

    var pinIntroScene = new ScrollMagic.Scene({
        triggerElement: '#top',
        triggerHook: 0,
        offset:'200'
    })
        .setPin('#logo', { pushFollowers: false })
       // .addIndicators({
         //   name: 'stop',
           // colorTrigger: 'black',
        //    colorStart: 'red',
        //    colorEnd: 'blue'
     //   })
        .addTo(controller);

    // var ourScene = new ScrollMagic.Scene({
    //     triggerElement: '#section0',
    //     triggerHook: 0.2,
    //     offset: '200'

    // })
    //     .setClassToggle('#logo', 'smaller') // add class to project01
    //     // .addIndicators({
    //     //     name: 'logo',
    //     //     colorTrigger: 'black',
    //     //     colorStart: '#75C695',
    //     //     colorEnd: 'pink'
    //     // }) // this requires a plugin
    //     .addTo(controller);

    var tween =TweenMax.to("#logo",0.3,{scale:0.2,yoyo:false,ease:Power0.easeNone});
    var ourscene2  =new ScrollMagic.Scene({
        triggerElement:'#top',
        triggerHook:0.2,
        offset:'200',
        // duration:'90%'
    })
    .setTween(tween)
    // .addIndicators()
    .addTo(controller);


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
        $('html,body').animate({ scrollTop: $('#section2').offset().top }, 1000);
    });
    $('.circle.c2').click(function () {
        $('.circle.c2').css('background', '#003');
        $('.circle.c1').css('background', '#000055');
        $('#test').css('display', 'block');
        $('#double').css('display', 'inline');
        $('#single').css('display', 'none');
        // $('html,body').animate({ scrollTop: $('#section2').offset().top }, 1000);
    });
    $('.btn.out.submit').click(function () {
        // $('#result').css('height', 'auto');
        // $('html,body').animate({ scrollTop: $('#section3').offset('0').top }, 888);
    });
    //再次滑上來做算命時，點選方式會出現滑不下去的狀況
    //點選點算之跳到了算命結果，明明設定了，scrolloverflowreset但是超過100vh就會被切掉
});