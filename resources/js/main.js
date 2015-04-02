var adDistance = 6;
var ads = 0;
var adArray = new Array();
var adNew   = new Array();

var header = {
    headerImagen:0,
    headerDescripcion:0,
    headerPrecio:0,
    headerNickname:0,
    headerFecha:0,
    headerHora:0
};

jQuery(function() {
    getAdsNumber();
    getAds();
    $('.adsContainer').perfectScrollbar({suppressScrollX: true});
    $(".headerImagen,.headerDescripcion,.headerPrecio,.headerNickname,.headerFecha,.headerHora").click(sortChange);
    $(".ad").click(goTo);
});

function resetHeaderArray(){
    header.headerImagen      =0;
    header.headerDescripcion =0;
    header.headerFecha       =0;
    header.headerHora        =0;
    header.headerNickname    =0;
    header.headerPrecio      =0;
}

function sortChange() {
    var clazz = $(this).attr("class");
    var typeSort = header[clazz];
    resetHeaderArray();
    typeSort++;
    header[clazz] = typeSort;
    setColorSort(clazz);
    resetColorSort(clazz);
    sort(clazz,header[clazz]);
}

function setColorSort(clazz){
    var attr = "."+clazz;
    
    if(header[clazz] == 3) {
        header[clazz] = 0;
    }
    switch(header[clazz]) {
        case 0:  $(attr).css("color","rgb(244,244,244)");  break;
        case 1:  $(attr).css("color","rgb(0,134,250)");    break;
        case 2:  $(attr).css("color","rgb(134,0,250)");    break;
    }
}

function resetColorSort(clazz){
    $.each(header,function(key,value) {
        if(key != clazz) {
            $("."+key).css("color","rgb(244,244,244)");
        }
    });
}

/*-------------------SORT----------------------*/
function getAdsNumber() {
    ads = parseFloat( $(".ad").length );
}

function getAds() {
    $(".ad").each(function() {
        var image       = $(this).find(".adImagen").attr("src");
        var description = $(this).find(".adDescripcion").text();
        var nickname    = $(this).find(".adNickname").text(); 
        var price       = $(this).find(".adPrecio").text(); 
        var date        = $(this).find(".adFecha").text(); 
        var time        = $(this).find(".adHora").text();
        var idAviso     = $(this).attr("idAviso");
        var ad = {
            idAviso:idAviso,
            imagen:image,
            descripcion:description,
            nickname:nickname,
            precio:price,
            fecha:date,
            hora:time
        };
        adArray.push(ad);
    });
    adNew = adArray.slice();
}

function sort(type,order) {
    if(order != 0) {
        for( var i=0; i<ads ; i++) {
        for( var j=0; j<ads-1 ; j++) {
            if( compare(type,i,j) ) {
                change(i,j);
                }
            }
        }   
        if(order == 2) {
            adNew = adNew.reverse();
        }
    } else {
        adNew = adArray.slice();
    }
    removeOldAds();
    setNewAds();
}

function compare(type,i,j){
    var devolve = false;
    switch(type) {
        case "headerImagen":        devolve = false;                                                    break;
        case "headerDescripcion":   devolve = compareAlpha(adNew[j].descripcion,adNew[i].descripcion);  break;
        case "headerPrecio":        devolve = compareMoney(adNew[j].precio,adNew[i].precio);            break;
        case "headerNickname":      devolve = compareAlpha(adNew[j].nickname,adNew[i].nickname);        break;
        case "headerFecha":         devolve = compareDates(adNew[j].fecha,adNew[i].fecha);              break;
        case "headerHora":          devolve = compareTimes(adNew[j].hora,adNew[i].hora);                break;
    }
    return devolve;
}

function change(i,j) {
    var temp = adNew[i];
    adNew[i] = adNew[j];
    adNew[j] = temp;
}

function compareAlpha(word1,word2){
	var regex = /([A-z0-9]+)(\s.+)?/;
	var devolve = false;
	var matchWord1 = regex.exec(word1);
	var matchWord2 = regex.exec(word2);
	var first1 = matchWord1[1];
	var first2 = matchWord2[1];
	var number1 = getLetterValue(first1);
	var number2 = getLetterValue(first2);
	var limit = 0;
	if(number1.length < number2.length) {
		limit = number1.length;
	} else {
		limit = number2.length;
	}
	var count = 0;
	for (var i=0; i < limit ; i++) {
		if(number1[i] > number2[i]) {
			devolve=true;
			i = limit+1;
		} else if(number1[i] < number2[i]){
			devolve=false;
			i = limit+1;
		} else if(number1[i] == number2[i]) {
			devolve=false;
			count++;
		}
		if(count >= limit) {
			if(number1.length < number2.length ) {
				devolve=true;
				i = limit+1;
			} else {
                devolve=false;
                i = limit+1;
            }
		}
	}
	return !devolve;   
}

function compareMoney(price1,price2) {
    var devolve = false;
    var price1Parse = parseFloat(price1);
    var price2Parse = parseFloat(price2);
    if( price1Parse > price2Parse ) {
        devolve = true;
    }
    return devolve;
}

function compareDates(date1,date2){
    var regex = /(\d{1,2})\/([A-Z][a-z]+)\/(\d{4})/;
	var devolve = false;
	var matchDate1 = regex.exec(date1);
	var matchDate2 = regex.exec(date2);

	matchDate1[1] = parseInt(matchDate1[1]);
	matchDate2[1] = parseInt(matchDate2[1]);
	
	matchDate1[2] = getMonthName(matchDate1[2]);
	matchDate2[2] = getMonthName(matchDate2[2]);
	
	matchDate1[3] = parseInt(matchDate1[3]);
	matchDate2[3] = parseInt(matchDate2[3]);
	
	if(matchDate1[3] > matchDate2[3]) {
		devolve=true;
	} else if(matchDate1[3] < matchDate2[3]) {
		devolve=false;
	} else if(matchDate1[3] == matchDate2[3]) {
		if(matchDate1[2] > matchDate2[2]) {
			devolve=true;
		} else if(matchDate1[2] < matchDate2[2]) {
			devolve=false;
		} else if(matchDate1[2] == matchDate2[2]) {
			if(matchDate1[1] > matchDate2[1]) {
				devolve=true;
			} else {
				devolve=false;
			}
		}
	}
	return devolve;
}

function compareTimes(time1,time2){
    var devolve = false;
    var regex = /(\d{2})\:(\d{2})(\:(\d{2}))?/;
    var matchTime1 = regex.exec(time1);
    var matchTime2 = regex.exec(time2);
    var hh1 = parseInt(matchTime1[1]);
    var mm1 = parseInt(matchTime1[2]);
    var ss1 = matchTime1[4];
    var hh2 = parseInt(matchTime2[1]);
    var mm2 = parseInt(matchTime2[2]);
    var ss2 = matchTime2[4];
    ss1 == null ? ss1 = 0 : ss1 = parseInt(ss1);
    ss2 == null ? ss2 = 0 : ss2 = parseInt(ss2);
    if( hh1 > hh2 ) {
        devolve=true;
    } else if( hh1 < hh2 ) {
        devolve=false;
    } else if( hh1==hh2 ) {
        if( mm1>mm2 ) {
            devolve=true;
        }else if( mm1 < mm2 ) {
            devolve=false;
        }else if( mm1 == mm2 ) {
            if( ss1 > ss2 ) {
                devolve=true;
            }else {
                devolve=false;
            }
        }
    }
    return devolve;
}

function getMonthName(name) {
	var devolve = 0;
	switch(name) {
		case "Enero": 		devolve = 1;  break; 	case "Febrero": 	devolve = 2;  break;
		case "Marzo": 		devolve = 3;  break; 	case "Abril": 		devolve = 4;  break;
		case "Mayo": 		devolve = 5;  break; 	case "Junio": 		devolve = 6;  break;
		case "Julio": 		devolve = 7;  break; 	case "Agosto": 		devolve = 8;  break;
		case "Septiembre": 	devolve = 9;  break; 	case "Octubre": 	devolve = 10; break;
		case "Noviembre": 	devolve = 11; break; 	case "Diciembre": 	devolve = 12; break;
	}
	return devolve;
}

function getLetterValue(word) {
	var array = (word.toUpperCase()).split('');
	for (var i=0; i < array.length; i++) {
	  	switch(array[i]) {
	  		case '0': array[i] = 37; break; case '1': array[i] = 36; break;
	  		case '2': array[i] = 35; break; case '3': array[i] = 34; break;
	  		case '4': array[i] = 33; break; case '5': array[i] = 32; break;
	  		case '6': array[i] = 31; break; case '7': array[i] = 30; break;
	  		case '8': array[i] = 29; break; case '9': array[i] = 28; break;
			case 'A': array[i] = 27; break; case 'B': array[i] = 26; break;
			case 'C': array[i] = 25; break; case 'D': array[i] = 24; break;
			case 'E': array[i] = 23; break; case 'F': array[i] = 22; break;
			case 'G': array[i] = 21; break; case 'H': array[i] = 20; break;
			case 'I': array[i] = 19; break; case 'J': array[i] = 18; break;
			case 'K': array[i] = 17; break; case 'L': array[i] = 16; break;
			case 'M': array[i] = 15; break; case 'N': array[i] = 14; break;
			case 'Ñ': array[i] = 13; break; case 'O': array[i] = 12; break;
			case 'P': array[i] = 11; break; case 'Q': array[i] = 10; break;
			case 'R': array[i] = 9;  break; case 'S': array[i] = 8;  break;
			case 'T': array[i] = 7;  break; case 'U': array[i] = 6;  break;
			case 'V': array[i] = 5;  break; case 'W': array[i] = 4;  break;
			case 'X': array[i] = 3;  break; case 'Y': array[i] = 2;  break;
			case 'Z': array[i] = 1;  break; default:  array[i] = 500;break;
	  	}
	}
	return array;
}

function removeOldAds() {
    $(".adsContainer").empty();
}

function setNewAds() {
    $.each( adNew, function( key, value ) {
        var idAviso     = value.idAviso;
        var imagen      = value.imagen;
        var precio      = value.precio;
        var descripcion = value.descripcion;
        var nickname    = value.nickname;
        var fecha       = value.fecha;
        var hora        = value.hora;
        
        var $ad             = $("<div>",{class:"ad",idAviso:idAviso});
        var $imagen         = $("<div>",{class:"imagen"});
        var $precio         = $("<div>",{class:"precio"});
        var $descripcion    = $("<div>",{class:"descripcion"});
        var $nickname       = $("<div>",{class:"nickname"});
        var $fecha          = $("<div>",{class:"fecha"});
        var $hora           = $("<div>",{class:"hora"});
        
        var $adImagen         = $("<img>",{class:"adImagen",src:imagen});     
        var $adPrecio         = $("<div>",{class:"adPrecio"});
        var $adDescripcion    = $("<div>",{class:"adDescripcion"});
        var $adNickname       = $("<div>",{class:"adNickname"});
        var $adFecha          = $("<div>",{class:"adFecha"}); 
        var $adHora           = $("<div>",{class:"adHora"}); 
        
        $adImagen.text(imagen);
        $adPrecio.text(precio);
        $adDescripcion.text(descripcion);
        $adNickname.text(nickname);
        $adFecha.text(fecha);
        $adHora.text(hora);
        
        $imagen.append($adImagen);     
        $precio.append($adPrecio);
        $descripcion.append($adDescripcion);
        $nickname.append($adNickname);
        $fecha.append($adFecha);
        $hora.append($adHora);

        $($ad).append($imagen);
        $($ad).append($descripcion);
        $($ad).append($precio);
        $($ad).append($nickname);
        $($ad).append($fecha);
        $($ad).append($hora);
        
        $ad.click(goTo);
        
        $(".adsContainer").append($ad);
    });
}

function goTo() {
    alert($(this).attr("idAviso"));
}