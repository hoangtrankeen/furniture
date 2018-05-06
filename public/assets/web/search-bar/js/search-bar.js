
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


    //Query

    $("#search-field").keyup(function(){
        var str=  $("#search-field").val();
        if(str === "") {
            console.log('khong co gi')
        }else {
            $.get( window.location.origin + '/tim-kiem?q=' +str, function( data ) {
                // $( "#txtHint" ).html( data );
                console.log(data);
            });
        }
    });

});
