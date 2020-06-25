/*global $, jQyery, alert, console, window*/
$(function () {


    // slider img height

    function setsize() {
        if ($(window).width() < 767) {
            $(".slider img").height('auto');
        } else {
            var win_hei = $(window).height(),
                heed = $("header").height();
            $(".slider img").height(win_hei - (heed));
        }
    }
    setsize();
    $(window).resize(function () {
        setsize();
    });


    //
    if ($('#lightgallery').length) {
        $('#lightgallery').lightGallery({
            pager: true
        });
    }


    $(".selector").flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d",
            minDate: "2020-01",
            maxDate: new Date().fp_incr(1 * 30 * 18 * 12) // 14 days from now
        }
    );
    tinymce.init({
        selector: '.editor'
    })
    
    //end

});

