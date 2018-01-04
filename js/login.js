    


$(document).ready(function () {
    $(".btn.add").click(function () {
        $("#add").addClass("click");
        $("#login").addClass("click");
        $('#add').css({
            'display': 'inline'
        });
    }); 
    // Init ScrollMagic
    var controller = new ScrollMagic.Controller();

    // build a scene
    var ourScene = new ScrollMagic.Scene({
        triggerElement: '#add',
        triggerHook: 0.7,
        duration:'40%'
    })
        .setClassToggle('#logo img', 'smaller') // add class to project01
        // .addIndicators({
        //     name: 'fade scene',
        //     colorTrigger: 'black',
        //     colorStart: '#75C695',
        //     colorEnd: 'pink'
        // }) // this requires a plugin
        .addTo(controller);
});
