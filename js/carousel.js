$(document).ready(function() {
    var carousel = $('.carousel');
    var slider = $('.slider');

    var prev = $(".prev")
    var next = $('.next');

    var direction;

    next.click(function(){
        direction = 1;
        carousel.css('justifyContent', 'flex-end');
        slider.css('transform', 'translate(-20%)');
        
    });

    prev.click(function(){
        direction = -1;
        carousel.css('justifyContent', 'flex-start');
        slider.css('transform', 'translate(20%)');
    });

    slider.on('transitionend', function() {

        if(direction == -1) {
            var primeiro = $(slider).children("section:first-child")
        } else if (direction == 1) {
            $(slider).prepend($("section:last-child"))
        }
        
        slider.append(primeiro);

        slider.css('transition', 'none')
        slider.css('transform', 'translate(0)')
        setTimeout(function(){
            slider.css('transition', 'all 0.5s')
        }) 
    })
});









