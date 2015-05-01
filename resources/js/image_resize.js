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
            var newWidth = $(this).width();
            var newMargin = size - newWidth;
            newMargin  = newMargin/2;
            $(this).css("margin-left",newMargin+"px");
        } else{
            $(this).addClass("sqr");
        }
        
    });
    
});