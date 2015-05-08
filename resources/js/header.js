
function setExpandContainer(clase) {
	$(".x"+clase).show();
	$('.'+clase).hide();
}

function toggleRegisterExpandContainer() {
	$('.registerExpandContainer').toggle();
	$(".xregisterExpandContainer").toggle();
	
	var display = $('.registerExpandContainer').css("display");
	var headerContainer = $(".headerContainer");
	if(display=="block") {
		headerContainer.css("border-bottom-left-radius","0px");
	} else if(display=="none") {
		headerContainer.css("border-bottom-left-radius","10px");
	}
}

function toggleLoginExpandContainer() {
	$('.loginExpandContainer').toggle();
	$(".xloginExpandContainer").toggle();
}

function toggleSearchBarExtraContainer() {
	$('.searchBarExtraContainer').toggle();
	$(".xsearchBarExtraContainer").toggle();
    var display = $('.searchBarExtraContainer').css("display");
    if(display=="block") {
        $("#searchBar").attr("disabled",true);
    } else {
        $("#searchBar").attr("disabled",false);  
    }
    resetSearchInputs();
}

function toggleSessionExtraContainer() {
	$('.sessionExtraContainer').toggle();
	$(".xsessionExtraContainer").toggle();
	var headerContainer = $(".headerContainer");
	var display = $('.sessionExtraContainer').css("display");
	var img = $(".imgMore");
	if(display=="block") {
		img.attr("src","/__BDM/img/icons/up.png");
        headerContainer.css("border-bottom-right-radius","0px");
	} else if(display=="none") {
		img.attr("src","/__BDM/img/icons/down.png");
        headerContainer.css("border-bottom-right-radius","10px");
	}
}

function cambiaSitio(url) {
	window.location.href = url;
}

function resetSearchInputs() {
    $('.searchBarExtraContainer input').val("");
    $('.searchBarExtraContainer .checkbox,.searchBarExtraContainer .radio').prop('checked', false);
}

$(function(){
	setExpandContainer("registerExpandContainer");
	setExpandContainer("loginExpandContainer");
	setExpandContainer("searchBarExtraContainer");
	setExpandContainer("sessionExtraContainer");
	$(".page_2,.page_3").toggle();
        
	$(".register").click(function() {
		toggleRegisterExpandContainer();
	});
	
	$(".logo").click(function(){
		cambiaSitio("/__BDM/controller/root.php");
	});
	
	$(".login").click(function() {
		toggleLoginExpandContainer();
	});
	
	$(".boton_1").click(function() {
		toggleSearchBarExtraContainer();
	});
	
	$(".profileMore").click(function() {
		toggleSessionExtraContainer();
	});
	
	$(".tabSearch").click(function(){
		var numero = parseInt($(this).attr("numero"));
		
		$(".page_1,.page_2,.page_3").hide();
		$(".page_"+numero).show();
		
		$(".tab_1,.tab_2,.tab_3").css({"background-color":"#545f60","color":"#D3FEF5"});
		$(".tab_"+numero).css({"background-color":"#649DA0","color":"#FFF"});
	});
	
	$(".tab_reset").click(resetSearchInputs);
    
    //edicion de usuario con right skyscraper
    $("#profileEditHeader").click({action:"edit"},toggleProfileEdit);
    $("#cancelNewUser").click({action:"cancel"},toggleProfileEdit);
});

function toggleProfileEdit(e) {
    if(e.data.action == "edit") {
        $("#superEditProfile").show();
        $("#superShowProfile").hide();
        $(".profileMore").trigger("click");
    } else if (e.data.action == "cancel") {
        $("#superEditProfile").hide();
        $("#superShowProfile").show();
    }
}
