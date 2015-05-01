/*
function resizeImages() {
    var size    = $(this).parent().height();
    var width 	= $(this).width();
    var height 	= $(this).height();
    
    if(width > height) {
        $(this).addClass("wdt");
        var newHeight = $(this).height();
        var newMargin = size - newHeight;
        newMargin  = newMargin/2;
        $(this).css("margin-top",newMargin+"px");
    } else if(height > width) {
        $(this).addClass("hgt");
    } else{
        $(this).addClass("sqr");
    }
}*/

$(document).ready(function() {
    
    $(".toResize").each(function() {
        var size    = $(this).parent().height();
        var width 	= $(this).width();
        var height 	= $(this).height();
        
        if(width > height) {
        $(this).addClass("wdt");
        var newHeight = $(this).height();
        var newMargin = size - newHeight;
        newMargin  = newMargin/2;
        $(this).css("margin-top",newMargin+"px");
        } else if(height > width) {
            $(this).addClass("hgt");
        } else{
            $(this).addClass("sqr");
        }
        
    });
    
});