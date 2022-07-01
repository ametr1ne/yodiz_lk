jQuery( document ).ready( function( $ ) {
    $('.logout-btn').on('click', function () {
        $.removeCookie('userID', {path: '/'});
    })
});