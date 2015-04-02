var tabs = {
    informacion: 1,
    avisos:      0,
    productos:   0,
    preguntas:   0,
    solicitude:  0,
    ventas:      0
};

var upTabs = {
    aviso:      0,
    producto:   0
};

$(setAll);

function setAll(){
    togglePage();
    $(".profileHeader").click(toggleTab);
    $(".profileAdContainer").perfectScrollbar({suppressScrollX: true});
    $(".profileProductContainer").perfectScrollbar({suppressScrollX: true});
    $(".profileQuestionContainer").perfectScrollbar({suppressScrollX:true});
    $(".profileRequestContainer").perfectScrollbar({suppressScrollX:true});
    $(".profileSalesContainer").perfectScrollbar({suppressScrollX:true});
    $("#filterAds").on("textchange",filterAds);
    $("#filterProducts").on("textchange",filterProducts);
    /*-upload-*/
    $("#newAd").click({toggle:true},toggleNewAdTab);
    $("#cancelNewAd").click({toggle:false},toggleNewAdTab)
    $("#newProduct").click({toggle:true},toggleNewProductTab);
    $("#cancelNewProduct").click({toggle:false},toggleNewProductTab);
};

function togglePage() {
    $(".profileHeader").each(function() {
        var checkedTab = $(this).attr("check");
        var tabClass   = $("."+$(this).attr("for"));
        (checkedTab=="true")? tabClass.show() : tabClass.hide();
    });
}

function toggleTab() {
    $(".profileHeader").attr("check","false");
    $(this).attr("check","true");
    togglePage();
}

function filterAds() {
    var text = $(this).val();
    if(text.trim()!="") {
        text = text.trimLeft();
        $(this).val(text);
        text = text.trimRight();
        var preRegex = ".*"+text+".*";
        var regex = new RegExp(preRegex,"i");
        
        $(".profileAd").each(function(){
            var text = $(this).find(".profileDescriptionAd").text();
            if (text.match(regex)) {
                $(this).fadeIn("fast");
            } else{
                $(this).fadeOut("fast");
            }
        });
        
    } else {
        $(".profileAd").show();
    }
}

function filterProducts() {
    var text = $(this).val();
    if(text.trim()!="") {
        text = text.trimLeft();
        $(this).val(text);
        text = text.trimRight();
        var preRegex = ".*"+text+".*";
        var regex = new RegExp(preRegex,"i");
        
        $(".profileProduct").each(function(){
            var text = $(this).find(".profileNameProduct").text();
            if (text.match(regex)) {
                $(this).fadeIn("fast");
            } else{
                $(this).fadeOut("fast");
            }
        });
        
    } else {
        $(".profileProduct").show();
    }
}

/*------------upload--------------*/
function toggleNewAdTab(e) {
    $(".profileHeader").attr("check",false);
    if(e.data.toggle) {
        $(".headerUploadAd").attr("check",true);
    }else{
        $(".headerAds").attr("check",true);
    }
    togglePage();
}

function toggleNewProductTab(e) {
    $(".profileHeader").attr("check",false);
    if(e.data.toggle) {
        $(".headerUploadProduct").attr("check",true);
    }else{
        $(".headerProducts").attr("check",true);
    }
    togglePage();
}