window.Clipboard = (function (window, document, navigator) {
    let textArea, copy;

    function isOS() {
        return navigator.userAgent.match(/ipad|iphone/i);
    }

    function createTextArea(text) {
        textArea = document.createElement('textArea');
        textArea.value = text;
        document.body.appendChild(textArea);
    }

    function selectText() {
        let range, selection;

        if (isOS()) {
            range = document.createRange();
            range.selectNodeContents(textArea);
            selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);
            textArea.setSelectionRange(0, 999999);
        } else {
            textArea.select();
        }
    }

    function copyToClipboard() {
        document.execCommand('copy');
        document.body.removeChild(textArea);
    }

    copy = function (text) {
        createTextArea(text);
        selectText();
        copyToClipboard();
    };

    return {
        copy: copy
    };
})(window, document, navigator);

function hidePopups() {
    $("body").removeClass("showFreePopup");
    $("body").removeClass("showPaidPopup");
    $("body").removeClass("showMarafonePopup");
}

function videoResize() {
    let e = .56 * $(".video").outerWidth();
    $(".video").css("height", e + "px")
}

$('.next-lesson').on('click', function () {
    let link = $(this).attr('data-href')
    let post = $(this).attr('data-post')
    $.ajax({
        url: myajax.url,
        type: "POST",
        data: {
            'action': 'nextLesson',
            data: [{link, post}]
        },
        success: function (response_json) {
            const response = JSON.parse(response_json);

            console.log(response)

            if (response['status'] === 'redirect') {
                window.location.href = link
            }
        }
    });
})

function copytext(el) {
    Clipboard.copy($(el).val());
}

$('.free-lessons li a').on('click', function () {
    if (!$(this).closest('li').hasClass('completed') && !$(this).closest('li').hasClass('selected')) {
        $("body").addClass("showFreePopup")
        closeAside()
    }
})


$('.paid-lessons li a').on('click', function () {
    if (!$(this).closest('li').hasClass('completed') && !$(this).closest('li').hasClass('selected')) {
        $("body").addClass("showPaidPopup")
        closeAside()
    }
})

$('.marafone-lessons li a').each(function () {
    $(this).on('click', function () {
        if (!$(this).closest('li').hasClass('completed') && !$(this).closest('li').hasClass('selected')) {
            $("body").addClass("showMarafonePopup")
            closeAside()
        }
    })
})

$(".close").on("click", function () {
    hidePopups()
})
$(".marafon_link").on("click", function () {
    hidePopups()
})
$(".dark-popup").on("click", function () {
    hidePopups()
})
$(".popup__btn").on("click", function () {
    hidePopups()
})


$(document).on("ready", function () {
    let e = $(".tools").outerHeight(!0);
    $(".progress__categories").css("max-height", e + "px")
})
$(".btn-arrow").on("click", function () {
    $(".progress").toggleClass("open-body")
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
}

$(".dark").on("click", function () {
    $('body').addClass('closed');
});

/*---------------- // moving sidebar ----------------------*/

/* video blocks */

$(".timecode").on("click", function () {

    $(this).closest("li").addClass("pressed")
    $(this).closest("li").siblings().removeClass("pressed");

    let e = $(this).closest(".video-block");

    $(e).find(".timecode").each(function (s) {
        if ($(this).closest("li").hasClass("pressed")) {
            let i = s;
            $(e).find("svg circle").each(function (e) {
                e <= i ? $(this).css("fill", "#8DE300") : $(this).css("fill", "#D0D0E1")
            })
        }
    })
})

videoResize()

let iframe = document.querySelectorAll("iframe");

$(".timecode").on("click", function () {
    $index = $(this).attr("data-index");
    let e = new Vimeo.Player(iframe[$index]);
    e.setCurrentTime($(this).attr("data-timecode"));
    e.play();
});
$(".content").on("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd", function () {
    videoResize()
});
$(window).on("resize", function () {
    videoResize()
});

/* // video blocks */