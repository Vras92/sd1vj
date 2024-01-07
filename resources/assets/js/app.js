import './bootstrap';
$(document).ready(function () {
    function flickerButton(button) {
        button.addClass('flicker-animation');
        setTimeout(function () {
            button.removeClass('flicker-animation');
        }, 1000);
    }

    $('.flicker-animation').on('click', function () {
        flickerButton($(this));
    });
});

$(document).ready(function () {
    // fadeIn animation
    function showNavigation() {
        $('nav').fadeIn(1000);
    }

    showNavigation();
});
