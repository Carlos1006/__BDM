var colorResult = {
    yes:    "", 
    no:     "", 
    wait:   ""
};
var resultRegister = {
    file:       false, 
    name:       false, 
    nickname:   false, 
    email:      false, 
    phone:      false, 
    password:   false
};
var resultSearch = {
    searchBar:  false, 
    date:       true, 
    name:       false, 
    text:       false, 
    dateRange:  false, 
    priceRange: false
};
var resultLogin = { 
    user:       false, 
    password:   false 
};

var currentErrors = new Array(null,null,null,null,null,null,null,null,null,null);

var error;

var regexImgFile 		= /.+\.(jpg|png|bmp|gif)/i;
var regexSpaceNames 	= /^\s+$/;
var regexCapitalNames 	= /^([A-Z][a-z]+\s?)+$/;
var regexCapitalNames2 	= /^([A-Z][a-z]+\s*)+$/;
var regexNickname 		= /^[A-z0-9\-\_\.]+$/;
var regexEmail			= /^[a-z0-9\.\-\_]+\@[a-z0-9]+(\.[a-z0-9]+)+$/;
var regexPhone			= /^([0-9]{8}|[0-9]{10})$/;
var regexPassword		= /^(?=(.*[a-z])+)(?=(.*[0-9])+)[0-9A-z\x21-\x7E]{8,}$/;
var regexPrice          = /^(\d+\.\d+|\d+)$/;

var regexSplitDate  = /(\d{1,2})\/([A-Z][a-z]+)\/(\d{4})/;

$(function(){
	$(this).ready(setDocument);
	
	/*-Registro-*/
	$('#file_0').change(validateProfilePicture);
 	$("#firstName,#lastName").on("textchange",validateName);
 	$("#nickName").on("textchange",validateNickname);
 	$("#email").on("textchange",validateEmail);
 	$("#phone").on("textchange",validatePhone);
 	$("#password_1,#password_2").on("textchange",validatePasswords);
 	$("#firstName,#lastName").change(trimNames);
    
 	/*-Busqueda Avanzada-*/
    $("#searchBar").on("textchange",validateSearchbar);
    $('#label-busquedaPorFecha').bind("DOMSubtreeModified",validateDateSearch);
 	$("#textSearch").on("textchange",validateTextSearch);
    $("#nicknameSearch").on("textchange",validateNicknameSearch);
    
    /*Busqueda Rangos*/
    $("#label-fechaRangoUno,#label-fechaRangoDos").bind("DOMSubtreeModified",validateDateRange);
    $("#priceSearch_1,#priceSearch_2").on("textchange",validatePriceRange);
    $("#priceSearch_1,#priceSearch_2").change(convertFloat);
    
    /*Login*/
    $("#userLogin,#passwordLogin").on("textchange",validateUserPassword);      
    
    /*Checkbox*/
    $(".checkbox").click(validateSearch);
    
    /*Boton-1 busquedaAvanzada*/
    $(".boton_1").click(resetSearchValues);
    
    /*Reset*/
    $(".tab_reset").click(resetSearchValues);
    
    /*Limpiando checkbox y radios*/
    $(".checkbox").click(resetTop);
    $(".radio").click(resetSearch);
});

/*--------------------------------------------------------------------------------------Funciones validatorias---------------------*/
/*--------------------------------------------------------------------------------------Registro-*/
function validateRegister() {
    //alert(resultRegister.file+","+resultRegister.name+","+resultRegister.nickname+","+resultRegister.email+","+resultRegister.phone+","+resultRegister.password);
    
	if( resultRegister.file 	=== true && 
		resultRegister.name 	=== true && 
		resultRegister.nickname === true && 
		resultRegister.email 	=== true && 
		resultRegister.phone 	=== true && 
		resultRegister.password === true
	) {
		$("#sendRegister").attr("disabled",false);
	}else {
		$("#sendRegister").attr("disabled",true);
	}
}

function validateProfilePicture() {
	var fileName = $(this).val();
	var verify = $("#verifyProfilePicture");
	if( fileName.match(regexImgFile) ) {
		resultRegister.file = true;
	}else {
		resultRegister.file = false;
	}
    
	if( resultRegister.file ) {
		verify.css("background-color",colorResult.yes);
        removeError(1);
	}else {
		verify.css("background-color",colorResult.no);
        appendError(1);
	}
	validateRegister();
}

function validateName() {
	var first = $("#firstName").val();
	var last = $("#lastName").val();
	var verify = $("#verifyName");
	
	if( first.match(regexCapitalNames) && last.match(regexCapitalNames) ) {
		resultRegister.name = true;
	} else {
		resultRegister.name = false;
	}
	
	if( resultRegister.name ) {
		verify.css("background-color",colorResult.yes);
        removeError(2);
	}else {
		verify.css("background-color",colorResult.no);
        appendError(2);
	}
	
	if(first=="" && last=="") {
		resultRegister.name = false;
		verify.css("background-color",colorResult.wait);
        removeError(2);
	}
	
	validateRegister();
}

function trimNames() {
	if( resultRegister.name ) {
		var name = $("#firstName").val();
		name = $.trim(name);
		name = name.replace(/\s{2,}/,' ');
		$("#firstName").val(name);
		
		name = $("#lastName").val();
		name = $.trim(name);
		name = name.replace(/\s{2,}/,' ');
		$("#lastName").val(name);
	}
}

function validateNickname() {
	var nick = $(this).val();
	var verify = $("#verifyNick");
	if( nick.match(regexNickname) ) {
		resultRegister.nickname = true;
        removeError(3);
	} else {
		resultRegister.nickname = false;
        appendError(3);
	}
	
	if( resultRegister.nickname ) {
		verify.css("background-color",colorResult.yes);
	} else {
		verify.css("background-color",colorResult.no);
	}
	
	if( nick=="" ) {
        removeError(3);
		resultRegister.nickname = false;
		verify.css("background-color",colorResult.wait);
	}
	validateRegister();
}

function validateEmail() {
	var email = $(this).val();
	var verify = $("#verifyEmail");
	if( email.match(regexEmail) ) {
		resultRegister.email = true;
        removeError(5);
	} else {
		resultRegister.email = false;
        appendError(5);
	}
	
	if( resultRegister.email ) {
		verify.css("background-color",colorResult.yes);
	} else {
		verify.css("background-color",colorResult.no);
	}
	
	if( email=="" ) {
		resultRegister.email = false;
		verify.css("background-color",colorResult.wait);
        removeError(5);
	}
	
	validateRegister();
}

function validatePhone() {
	var phone = $(this).val();
	var verify = $("#verifyPhone");
	if( phone.match(regexPhone) ) {
		resultRegister.phone = true;
        removeError(7);
	} else {
		resultRegister.phone = false;
        appendError(7);
	}
	
	if( resultRegister.phone ) {
		verify.css("background-color",colorResult.yes);
	} else {
		verify.css("background-color",colorResult.no);
	}
	
	if( phone=="" ) {
		resultRegister.phone = false;
        removeError(7);
		verify.css("background-color",colorResult.wait);
	}
	
	validateRegister();
}

function validatePasswords() {
	var password_1 = $("#password_1").val();
	var password_2 = $("#password_2").val();
	var verify = $("#verifyPassword");
	
	if( password_1.match(regexPassword) ) {
		removeError(9);
		if( password_1 == password_2 ) {
			resultRegister.password = true;
            removeError(8);
		} else {
			resultRegister.password = false;
            appendError(8);
		}
		
	} else {
		resultRegister.password = false;
        appendError(9);
	}
	
	if( resultRegister.password ) {
		verify.css("background-color",colorResult.yes);
	} else {
		verify.css("background-color",colorResult.no);
	}
	
	if( password_1=="" && password_2=="" ) {
		resultRegister.password = false;
		verify.css("background-color",colorResult.wait);
        removeError(9);
        removeError(8);
	}
    validateRegister();
}

/*--------------------------------------------------------------------------------------Busqueda Avanzada-*/
function validateTextSearch() {
    var textSearch = $(this).val();
    var verify = $("#validateTextSearch");

    if( !textSearch.match(/\s{2,}/) && !textSearch.match(/(^\s+)|(\s+$)/) ) {
        resultSearch.text = true;
        removeError(10);
    } else {
        resultSearch.text = false;
        appendError(10);
    }

    if( resultSearch.text ) {
        verify.css("background-color",colorResult.yes);
    } else {
        verify.css("background-color",colorResult.no);
    }

    if( textSearch=="" ) {
        resultSearch.text = false;
        verify.css("background-color",colorResult.wait);
        removeError(10);
    }
    validateSearch();
}

function validateDateSearch() {
    var dateSearch = $(this).text();
    var verify = $("#verifyDateSearch");

    var dateNow = getNow();
    var date = getSplitDateArray(dateSearch);

    if( compareDates_header(date,dateNow) ) {
        resultSearch.date = false;
        appendError(11);
    } else{
        resultSearch.date = true;
        removeError(11);
    }

    if ( resultSearch.date ) {
        verify.css("background-color",colorResult.yes);
    } else {
        verify.css("background-color",colorResult.no);
    }

    validateSearch();
}

function validateNicknameSearch() {
    var nicknameSearch = $(this).val();
    var verify = $("#verifyNicknameSearch");
    if( nicknameSearch.match(regexNickname) ) {
        resultSearch.name = true;
        removeError(12);
    } else {
        resultSearch.name = false;
        appendError(12);
    }

    if( resultSearch.name ) {
        verify.css("background-color",colorResult.yes);
    } else {
        verify.css("background-color",colorResult.no);
    }

    if( nicknameSearch=="" ) {
        resultSearch.name = false;
        verify.css("background-color",colorResult.wait);
        removeError(12);
    }
    validateSearch();
}

function validateDateRange() {
    var dateString_1 = $("#label-fechaRangoUno").text();
    var dateString_2 = $("#label-fechaRangoDos").text();
    var verify = $("#verifyDateRange");
    var date_1 = getSplitDateArray(dateString_1);
    var date_2 = getSplitDateArray(dateString_2);
    var dateNow = getNow();       

    if( compareDates_header(date_1,date_2) ) {
        resultSearch.dateRange = false;
        appendError(13);
    } else {
        resultSearch.dateRange = true;
        removeError(13);
    }

    
    if( compareDates_header(date_1,dateNow) || compareDates_header(date_2,dateNow) ) {
        resultSearch.dateRange = false;
        appendError(14);
    }else {
        removeError(14);
    }

    if( resultSearch.dateRange ) {
        verify.css("background-color",colorResult.yes);
    }else {
        verify.css("background-color",colorResult.no);
    }

    if(equalDate(date_1,date_2)) {
        removeError(13);
        removeError(14);
        resultSearch.dateRange = false;
        verify.css("background-color",colorResult.wait);
    }
    validateSearch();
}

function validatePriceRange() {
    var price_1 = $("#priceSearch_1").val();
    var price_2 = $("#priceSearch_2").val();
    var verify  = $("#verifyPriceRange");

    if( price_1.match(regexPrice) && price_2.match(regexPrice) ) { 
        removeError(15);
        price_1 = parseFloat(price_1);
        price_2 = parseFloat(price_2);
        if( price_1 >= price_2 ) {
            appendError(16);
            resultSearch.priceRange = false;
        }else {
            resultSearch.priceRange = true;
            removeError(16);
        }
    }else {
        resultSearch.priceRange = false;
        appendError(15);
    }

    if( resultSearch.priceRange ) {
        verify.css("background-color",colorResult.yes);
    } else {
        verify.css("background-color",colorResult.no);
    }

    if( price_1=="" && price_2 == "") {
        removeError(15);
        removeError(16);
        resultSearch.priceRange = false;
        verify.css("background-color",colorResult.wait);
    }
    validateSearch();
}

function validateSearchbar() {
    var searchBar = $(this).val();
    if( !searchBar.match(/^\s+$/) ) {
        resultSearch.searchBar = true;
    }else {
        resultSearch.searchBar = false;
    }

    if(searchBar=="") {
        resultSearch.searchBar = false;
    }
    validateSearch();    
}

function validateSearch() {
    var validate = {
        searchBar:  false, 
        date:       false, 
        name:       false, 
        text:       false, 
        dateRange:  false, 
        priceRange: false
    };
    var textCheckbox = $("#textCheckbox").is(':checked');
    var dateCheckbox = $("#dateCheckbox").is(':checked');
    var nickCheckbox = $("#nickCheckbox").is(':checked');
    var dateRangeCheckbox = $("#dateRangeCheckbox").is(':checked');
    var priceRangeCheckbox = $("#priceRangeCheckbox").is(':checked');
    if(textCheckbox) {
        validate.text = resultSearch.text;
    } else {
        validate.text = true;
    }

    if(dateCheckbox) {
        validate.date = resultSearch.date;
    } else {
        validate.date = true;
    }

    if(nickCheckbox) {
        validate.name = resultSearch.name;
    } else {
        validate.name = true;
    }

    if(dateRangeCheckbox) {
        validate.dateRange = resultSearch.dateRange;
    } else {
        validate.dateRange = true;
    }

    if(priceRangeCheckbox) {
        validate.priceRange = resultSearch.priceRange;
    } else {
        validate.priceRange = true;
    }

    if( !textCheckbox && !dateCheckbox && !nickCheckbox && !dateRangeCheckbox && !priceRangeCheckbox ) {
        validate.searchBar = resultSearch.searchBar;
    } else {
        validate.searchBar = true;
    }

    if( validate.date && validate.dateRange && validate.name && validate.priceRange && validate.text && validate.searchBar ) {
        $("#searchButton").attr("disabled",false);
    } else {
        $("#searchButton").attr("disabled",true);
    }
}

/*--------------------------------------------------------------------------------------login-*/
function validateUserPassword() {
    var user        = $("#userLogin").val();
    var password    = $("#passwordLogin").val(); 
    var verify      = $("#verifyLogin");

    if( user.match(/^\s+$/) ) {
        resultLogin.user = false;
    }

    if( password.match(/^\s+$/) ) {
        resultLogin.password = false;
    }

    if( user.match(regexNickname) ) {
        resultLogin.user = true;
    }

    if( password.match(regexPassword) ) {
        resultLogin.password = true;
    }

    if( resultLogin.user && resultLogin.password ) {
        verify.css("background-color",colorResult.yes);
        removeError(17);
    }else {
        verify.css("background-color",colorResult.no);
        appendError(17);
    }

    if( password=="" && user=="" ) {
        resultLogin.password = false;
        resultLogin.user = false;
        verify.css("background-color",colorResult.wait);
        removeError(17);
    }
    validateLogin();
}

function validateLogin() {
    if( resultLogin.user && resultLogin.password ) {
        $("#loginButton").attr("disabled",false);
    } else {
        $("#loginButton").attr("disabled",true);
    }
}

/*--------------------------------------------------------------------------------------Caja de errores-*/
function hideBox() {
    $( ".errorBox" ).animate({"bottom":"-20%"},200);
};

function showBox() {
    $( ".errorBox" ).animate({"bottom":"0%"},1000);
};

function appendError(errorNum) {
    var lenghtError = $("#error_"+errorNum).length;
    if(lenghtError === 0) {
        if( !$.trim( $(".superError").html() ).length ) {
            showBox();
        }
        $(".superError").append($.trim("<div class='errorContainer' id='error_"+errorNum+"'><span>"+error[errorNum]+"</span></div>"));
    }
}

function removeError(errorNum) {
    $("#error_"+errorNum).remove();
    if( !$.trim( $(".superError").html() ).length ) {
        hideBox();
    }
}

/*--------------------------------------------------------------------------------------Funciones no validatorias---------------------*/
function getErrorJson() {
	$.ajax({
    	'async': false,
    	'url': "/__BDM/resources/json/errores.json",
    	'dataType': "json",
    	'success': function (data) {
        	error = data;
    	}
	});
}

function setColorResult() {
	var resultMeta = $("#colorValidator");
	colorResult.yes  = resultMeta.attr("yes");
	colorResult.no	 = resultMeta.attr("no");
	colorResult.wait = resultMeta.attr("wait");
}

function setDocument() {
	setColorResult();
    getErrorJson();
	validateRegister();
    validateLogin();
    validateSearch();
    $("#verifyDateSearch").css("background-color",colorResult.yes);
    $('.errorBox').perfectScrollbar({suppressScrollX: true});
}

function getMonthNumber(month) {
    var devovler = 0;
    switch(month) {
            case"Enero":        devovler=1;  break;
            case"Febrero":      devovler=2;  break;
            case"Marzo":        devovler=3;  break;
            case"Abril":        devovler=4;  break;
            case"Mayo":         devovler=5;  break;
            case"Junio":        devovler=6;  break;
            case"Julio":        devovler=7;  break;
            case"Agosto":       devovler=8;  break;
            case"Septiembre":   devovler=9;  break;
            case"Octubre":       devovler=10; break;
            case"Noviembre":    devovler=11; break;
            case"Diciembre":    devovler=12; break;
    }
    return devovler;
}

function getSplitDateArray(dateString) {
    var date = regexSplitDate.exec(dateString);
    var dateArray = new Array();
    try {
        dateArray[0] = 0;
        dateArray[1] = date[1];
        dateArray[2] = date[2];
        dateArray[3] = date[3];

        dateArray[2] = getMonthNumber(dateArray[2]);
        dateArray[1] = parseInt(dateArray[1]);
        dateArray[3] = parseInt(dateArray[3]);
    }
    catch(err) {
    
    }
    return dateArray;
}

function compareDates_header(date1,date2) {
    var devolve = null;

    if(date1[3] >  date2[3]) {
        devolve = true;
    }else if(date1[3] <  date2[3]) {
        devolve = false;
    }else if(date1[3] == date2[3]) {
        
        if(date1[2] >  date2[2]) {
            devolve = true;
        }else if(date1[2] <  date2[2]) {
            devolve = false;
        }else if(date1[2] == date2[2]) {
            
            if(date1[1] >  date2[1]) {
                devolve = true;
            }else if(date1[1] <  date2[1]) {
                devolve = false;
            }else if(date1[1] == date2[1]) {
                devolve = false;
            }
        }
    }
    
    return devolve;
}

function equalDate(date1,date2) {
    var devolve = null;
    if( date1[3] == date2[3] && date1[2] == date2[2] && date1[1] == date2[1] ) {
        devolve = true;
    }
    return devolve;
}

function getNow() {
    var date = new Date();
    var dateNow =[0,0,0,0];
    dateNow[1] = parseInt(date.getDate());
    dateNow[2] = parseInt(date.getMonth()) + 1;
    dateNow[3] = parseInt(date.getFullYear());
    return dateNow;
}

function convertFloat() {
    var num = $(this).val();
    if(num.match(/^\d+$/)) {
        num = num+".00";
    } else if( num.match(/^\d+\.\d$/) ) {
        num = num+"0";
    }
    $(this).val(num);
}

function resetSearchValues() {
    resultSearch.searchBar  = false;
    resultSearch.date       = true;
    resultSearch.name       = false;
    resultSearch.text       = false;
    resultSearch.dateRange  = false;
    resultSearch.priceRange = false;
    $("#searchBar").val("");
    $('.searchBarExtraContainer .verify,.searchBarExtraContainer .verifySearchContainer,.searchBarExtraContainer .verifyRange').css("background-color",colorResult.wait);
    $("#verifyDateSearch").css("background-color",colorResult.yes);
    removeError(10);
    removeError(11);
    removeError(12);
    removeError(13);
    removeError(14);
    removeError(15);
    removeError(16);
    fechaActual();
    validateSearch();
}

function totalReset() {
    $('.searchBarExtraContainer input').val("");
    $('.searchBarExtraContainer .checkbox,.searchBarExtraContainer .radio').prop('checked', false);
    resetSearchValues();
    disabledTop();
}

function disabledTop() {
    $(".top").removeAttr("checked");
}

function resetTop() {
    $(".topInputText").val(null);
    $('.searchBarExtraContainer .radio').prop('checked', false);
    disabledTop();
}

function resetSearch() {
    resetSearchValues();
    $("#textSearch,#nicknameSearch,#priceSearch_1,#priceSearch_2").val(null);
    $('.searchBarExtraContainer .checkbox').prop('checked', false);
    $("#searchButton").attr("disabled",false);
}

function fechaActual() {
    var date = new Date();
    var currentYear = date.getFullYear();
    var currentMonth = date.getMonth();
    var currentDay = date.getDate();
    mes = currentMonth+1;

    var fechaFinal_busquedaPorFecha = pad(currentDay)+"/"+$("."+mes+"busquedaPorFecha").text()+"/"+currentYear;
    $("#label-busquedaPorFecha,#label-fechaRangoUno,#label-fechaRangoDos").text(fechaFinal_busquedaPorFecha);
}

function pad(d) {
    return (d < 10) ? '0' + d.toString() : d.toString();
}