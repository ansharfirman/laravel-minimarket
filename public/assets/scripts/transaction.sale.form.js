$(function(){
   // $("body").addClass("fixed");
});

$(window).resize(function() {
    var window_height = $(window).height();
    var size = window_height - ((window_height / 100) * 55);   
    $("#product-detail-section").slimscroll({
        height: size+"px",
    });
});

$(window).trigger('resize');