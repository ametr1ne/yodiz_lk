jQuery(document).ready(function ($) {

    /*----------- moving sidebar ------------------*/

    $('.header__burger-box').on('click', function () {
        $('body').toggleClass('closed');
    })

    $(window).resize(function () {
        if (window.matchMedia("(max-width: 1240px").matches) {
            $('body').addClass('closed');
        }
    })

    if (window.matchMedia("(max-width: 1240px").matches) {
        $('body').addClass('closed');
    } else {
        $('body').removeClass('closed');
    }

    $(".dark").on("click", function () {
        $('body').addClass('closed');
    });

    /*---------------- moving sidebar ----------------------*/

    /* opening user percent progress */

    $('.btn-arrow').on('click', function () {
        $('.progress').toggleClass('progress--open')
    })

    /* // opening user percent progress */

});