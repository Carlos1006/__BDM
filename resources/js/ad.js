var slideWidth = 0;
var limitSlides = 1;
var media = 0;
var initialSlide;

var stockLimit = 5; //hardcode
var stock = 1;

$(function() {
    
    initialSlide = $(".absoluteSlide").html();
    slideshow();
    setStock();
    
    $(".rightSlide").click(slideRight);
    $(".leftSlide").click(slideLeft);
    
    $(".-Button_1").click(downStock);
    $(".-Button_2").click(upStock);
    
    $(".questionsContainer").perfectScrollbar({suppressScrollX:true});
    
    $(window).resize(resize);
    
});

function resize() {
    limitSlides=1;
    $( ".absoluteSlide" ).css("margin-left",0);
    slideshow();
}

function slideshow(){
    media = $(".media").length;
    slideWidth = $(".slideshow").width(); 
    var newAbsoluteSize = media*100;
    $(".absoluteSlide").css("width",newAbsoluteSize+"%");
    var newWidth = 100/media;
    $(".media").css("width",newWidth+"%");
}

function slideRight() {
    limitSlides++;
    if(limitSlides<=media) {
        $( ".absoluteSlide" ).animate(
            {
                marginLeft: "-="+slideWidth
            }, 
            { 
                duration: 200,
                specialEasing: {
                            marginLeft: "linear"
                },
                complete: function() {}
            }
        );
    } else{
        limitSlides=1;
        $( ".absoluteSlide" ).css("margin-left",0);
    }
}

function slideLeft() {
    limitSlides--;
    if(limitSlides>=1) {
        $( ".absoluteSlide" ).animate(
            {
                marginLeft: "+="+slideWidth
            }, 
            { 
                duration: 200,
                specialEasing: {
                            marginLeft: "linear"
                },
                complete: function() {}
            }
        );
    } else {
        limitSlides=media;
        $( ".absoluteSlide" ).css("margin-left",(media-1)*slideWidth*-1);
    }
}

function upStock(){
    if(stock<stockLimit) {
        stock++;
    }
    setStock();
}

function downStock(){
    if(stock>1) {
        stock--;
    }
    setStock();
}

function setStock(){
    $(".-stock").text(stock);
}