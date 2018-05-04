
$(document).ready(function () {

    function expandSearch() {
        $(".search").toggleClass("close");
        $(".input").toggleClass("square");
        if ($('.search').hasClass('close')) {
            $('.input').focus();
        } else {
            $('.input').blur();
        }
    }

    $('.search').on('click', expandSearch);

});
