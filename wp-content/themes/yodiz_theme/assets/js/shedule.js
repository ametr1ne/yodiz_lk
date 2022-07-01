$(".btn-arrow").on("click", function () {

    if ($('.progress').hasClass('open-body')) {
        $(".progress__categories").css("max-height", '0')
        $(".progress").toggleClass("open-body")
    } else {
        $(".progress").addClass("open-body")
        $(".progress__categories").css("max-height", "600px")
    }
})

$('.number').each(function (e) {
    $(this).text(e + 1)
})

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