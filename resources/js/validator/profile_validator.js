//funciones prestadas de header_validator
/*
    compareDates_header
    getSplitDateArray
    colorResult (objeto)
    equalDate
*/

var pValidator = {
    nombre:     false,
    precio:     false,
    vigencia:   false,
    existencia: false,
    descripcionCorta : false,
    descripcionLarga : false,
    imagen_1:   true,
    imagen_2:   true,
    imagen_3:   true,
    imagen_4:   true,
    video_1:    true,
    video_2:    true
};

var aValidator = {
    cantidad:   false,
    precio:     false,
    vigencia:   false,
    descripcionCorta: false,
    descripcionLarga: false,
    producto    :false,
    categoria   :false,
    subcategoria:false,
    metodo_pago :false
};

var error;
var errorImage = [true,true,true,true];
var errorVideo = [true,true];

$(setAllValidator);

function setAllValidator() {
    getErrorJson();
    $("#pName") .on("textchange",validatePName);
    $("#pPrice").on("textchange",{type:"P"},validateAPPrice);
    $("#aPrice").on("textchange",{type:"A"},validateAPPrice);
    $("#pStock").on("textchange",{type:"P"},validateAPStock);
    $("#aStock").on("textchange",{type:"A"},validateAPStock);
    $("#pShort").keyup({lenght:"Short",type:"P"},validateAPDescription);
    $("#aShort").keyup({lenght:"Short",type:"A"},validateAPDescription);
    $("#pLong") .keyup({lenght:"Long",type:"P"},validateAPDescription);
    $("#aLong") .keyup({lenght:"Long",type:"A"},validateAPDescription);
    $(".pImage").change(validatePImage);
    $(".pVideo").change(validatePVideo);
    $("#pPrice").change(paPadFloat);
    $("#pName,#pShort,#pLong")  .change(paTrimNames);
    $("#label-vigenciaAviso")   .bind("DOMSubtreeModified",{type:"A"},validateAPDate);
    $("#label-vigenciaProducto").bind("DOMSubtreeModified",{type:"P"},validateAPDate);
    $("#aProduct")     .change({type:"Product"},validateASelect);
    $("#aCategory")    .change({type:"Category"},validateASelect);
    $("#aSubcategory") .change({type:"Subcategory"},validateASelect);
    $(".pay").click(checkPay);
    validateNewProduct();
    validateNewAd();
    $(".errorAds").perfectScrollbar({suppressScrollX: true});
};

function validateNewProduct() {
    if( pValidator.nombre     == true &&
        pValidator.precio     == true &&
        pValidator.vigencia   == true &&
        pValidator.existencia == true &&
        pValidator.imagen_1   == true &&
        pValidator.imagen_2   == true &&
        pValidator.imagen_3   == true &&
        pValidator.imagen_4   == true &&
        pValidator.video_1    == true &&
        pValidator.video_2    == true &&
        pValidator.descripcionCorta == true &&
        pValidator.descripcionLarga == true 
      )
    {
        $("#okNewProduct").attr("disabled",false);
    }
    else
    {
        $("#okNewProduct").attr("disabled",true);
    }
}

function validateNewAd() {
    if ( aValidator.cantidad     == true &&
         aValidator.precio       == true &&
         aValidator.vigencia     == true &&
         aValidator.producto     == true &&
         aValidator.categoria    == true &&
         aValidator.subcategoria == true &&
         aValidator.descripcionCorta == true &&
         aValidator.descripcionLarga == true &&
         aValidator.metodo_pago == true
       ) 
    {
        $("#okNewAd").attr("disabled",false);
    }else{
        $("#okNewAd").attr("disabled",true);
    }
}

/*-Prefijo AP-*/
function validateAPStock(e) {
    var string = $(this).val();
    var x = e.data.type;
    
    var tempValidator = null;
    var object = $("#v"+e.data.type+"Stock");
    
    if(string.match(/^\d+$/) && !string.match(/^0+$/)) {
        object.css("background",colorResult.yes);
        tempValidator = true;
        (e.data.type == "A") ? removeAError(21) : removePError(21); 
    } else if(string.trim() == "") {
        object.css("background",colorResult.wait);
        tempValidator = false;
        (e.data.type == "A") ? removeAError(21) : removePError(21); 
    } else {
        object.css("background",colorResult.no);
        tempValidator = false;
        (e.data.type == "A") ? addAError(21) : addPError(21); 
    }
    
    if(e.data.type == "A") {
        aValidator.cantidad = tempValidator;
        validateNewAd();
    } else if(e.data.type == "P") {
        validateNewProduct();
        pValidator.existencia = tempValidator;
    }
}

function validateAPPrice(e) {
    var string = $(this).val();
    var tempValidator = null;
    var object = $("#v"+e.data.type+"Price");
    
    if(string.match(/^(\d+\.\d+|\d+)$/)) {
        object.css("background",colorResult.yes);
        tempValidator = true;
        (e.data.type == "A") ? removeAError(19) : removePError(19); 
    } else if(string.trim() == "") {
        object.css("background",colorResult.wait);
        tempValidator = false;
        (e.data.type == "A") ? removeAError(19) : removePError(19);  
    } else {
        object.css("background",colorResult.no);
        tempValidator = false;
        (e.data.type == "A") ? addAError(19) : addPError(19); 
    }
    
    if(e.data.type == "A") {
        aValidator.precio = tempValidator;
        validateNewAd();
    } else if(e.data.type == "P") {
        pValidator.precio = tempValidator;
        validateNewProduct();
    }
}

function validateAPDate(e) {
    var string = $(this).text();
    var object = $("#v"+e.data.type+"Date");
    var dateNow = getNow();
    var date = getSplitDateArray(string);
    var tempValidator = null;
    
    (e.data.type == "A") ? removeAError(20) : removePError(20);
    if(equalDate(date,dateNow)) {
        object.css("background",colorResult.wait);
        tempValidator = false;
        (e.data.type == "A") ? removeAError(20) : removePError(20);
    } else {
        object.css("background",colorResult.no);
        tempValidator = false;
        (e.data.type == "A") ? addAError(20) : addPError(20); 
    }
    if( compareDates_header(date,dateNow) ) {
        object.css("background",colorResult.yes);
         tempValidator = true;
        (e.data.type == "A") ? removeAError(20) : removePError(20); 
    }
    
    if(e.data.type == "A") {
        aValidator.vigencia = tempValidator;
        validateNewAd();
    } else if(e.data.type == "P") {
        pValidator.vigencia = tempValidator;
        validateNewProduct();
    }
}

function validateAPDescription(e) {
    var string = $(this).val();
    var object = $("#v"+e.data.type+e.data.lenght);
    var tempValidator = null;   
    var str_1 = null;
    var str_2 = null;
    if(string.match(/^\s+$/)){
        object.css("background",colorResult.no);
        tempValidator = false;
    } else if(string.trim() == "") {
        object.css("background",colorResult.wait);
        tempValidator = false;
    } else {
        object.css("background",colorResult.yes);
        tempValidator = true;
    }
    if(e.data.type == "A") {
        if(e.data.lenght == "Short") {
            aValidator.descripcionCorta = tempValidator;
        } else if(e.data.lenght == "Long") {
            aValidator.descripcionLarga = tempValidator;
        }
        validateNewAd();
        
        if(tempValidator) { removeAError(22); } 
        else {
            if( $("#aError22").length==0 ) { addAError(22); }
        }
        str_1 = $("#vAShort").css("background-color");
        str_2 = $("#vALong").css("background-color");
        if(str_1.indexOf("rgb(96, 173, 221)") !=-1 && str_2.indexOf("rgb(96, 173, 221)") !=-1) { removeAError(22); }
        
    } else if(e.data.type == "P") {
        if(e.data.lenght == "Short") {
            pValidator.descripcionCorta = tempValidator;
        } else if(e.data.lenght == "Long") {
            pValidator.descripcionLarga = tempValidator;
        }
        validateNewProduct();
        
        if(tempValidator) {  removePError(22); } 
        else {
            if($("#pError22").length==0 ) { addPError(22); }
        }
        str_1 = $("#vPShort").css("background-color");
        str_2 = $("#vPLong").css("background-color");
        if(str_1.indexOf("rgb(96, 173, 221)") !=-1 && str_2.indexOf("rgb(96, 173, 221)") !=-1) { removePError(22); }
        
    }
    
}

/*-Prefijo P-*/
function validatePName() {
    var string = $(this).val();
    var object = $("#vPName");
    if(string.match(/^\s+$/)) {
        object.css("background",colorResult.no);
        pValidator.nombre = false;
        addPError(18);
    } else if(string.trim() == "") {
        object.css("background",colorResult.wait);
        pValidator.nombre = false;
        removePError(18);
    } else {
        object.css("background",colorResult.yes);
        pValidator.nombre = true;
        removePError(18);
    }
    validateNewProduct();    
}

function validatePImage() {
    var string = $(this).val();
    var number = $(this).attr("number");
    var object = $("#vPImage"+number);
    if(string.match(/.+\.(jpg|png|bmp)/i)) {
        object.css("background",colorResult.yes);
        pValidator["imagen_"+number] = true;
        errorImage[number-1] = true;
        if(errorImage[0] && errorImage[1] && errorImage[2]) {
            removePError(23);
        }
    }else if(string.trim() == "") {
        object.css("background",colorResult.wait);
        pValidator["imagen_"+number] = true;
        errorImage[number-1] = true;
        if(errorImage[0] && errorImage[1] && errorImage[2]) {
            removePError(23);
        }
    }else {
        object.css("background",colorResult.no);  
        pValidator["imagen_"+number] = false;
        if(errorImage[0] && errorImage[1] && errorImage[2]) {
            addPError(23);
        }
        errorImage[number-1] = false;
    }
    
    validateNewProduct();
}

function validatePVideo() {
    var string = $(this).val();
    var number = parseInt($(this).attr("number")) - 4; //se resta 4 debido a que es el archivo numero 5 en la pagina pero se toma como video 1
    var object = $("#vPVideo"+number);
    
    if(string.match(/.+\.(mp4|avi|wmv)/i)) {
        object.css("background",colorResult.yes);
        pValidator["video"+number] = true;
        errorVideo[number-1] = true;
        if(errorVideo[0] && errorVideo[1]) {
            removePError(24);
        }
    }else if(string.trim() == "") {
        object.css("background",colorResult.wait);
        pValidator["video"+number] = true;
        errorVideo[number-1] = true;
        if(errorVideo[0] && errorVideo[1]) {
            removePError(24);
        }
    }else {
        object.css("background",colorResult.no);  
        pValidator["video"+number] = false;
        if(errorVideo[0] && errorVideo[1]) {
            addPError(24);
        }
        errorVideo[number-1] = false;
    }
    validateNewProduct();
}


/*-Prefijo A-*/
function validateASelect(e) {
    
    //var string = $("#a"+e.data.type+" option:selected").text();
    var string = $("#a"+e.data.type).val();
    var object = $("#vA"+e.data.type);
    var tempValidator = null;
    if(string == "") {
        object.css("background",colorResult.no);
        tempValidator = false;
    } else {
        object.css("background",colorResult.yes);
        tempValidator = true;
    }
    
    switch(e.data.type) {
        case "Product":     aValidator.producto     = tempValidator; break;
        case "Category":    aValidator.categoria    = tempValidator; break;
        case "Subcategory": aValidator.subcategoria = tempValidator; break;
    }
    validateNewAd();
}

function validatePay() {
    var object = $("#vAPay");
    if( $( ".pay[check='true']" ).length > 0 ) {
        object.css("background",colorResult.yes);
        aValidator.metodo_pago==true;
    } else {
        object.css("background",colorResult.wait);
        aValidator.metodo_pago==false;
    }
}

/*--------Funciones no validatorias---------*/
function paTrimNames(){
    var string = $(this).val();
    string = $.trim(string);
    string = string.replace(/\s{2,}/,' ');
    $(this).val(string);
}

function paPadFloat() {
    var string = $(this).val();
    if(string.match(/^\d+$/)) {
        string = string+".00";
    } else if( string.match(/^\d+\.\d$/) ) {
        string = string+"0";
    }
    $(this).val(string);
}

function checkPay(){
    var string = $(this).attr("check");
    if(string=="true") {
        string='false';
    }else {
        string='true';
    }
    $(this).attr("check",string);
    validatePay();
}

/*-------------Caja de errores-------------*/
function addAError(errorN) {
    $div = $("<div>",{class:"errorAd",id:"aError"+errorN});
    $div.text( error[errorN] );
    if( $("#aError"+errorN).length == 0 ) {
        $("#aErrors").append($div);
    }
}

function addPError(errorN) {
    $div = $("<div>",{class:"errorAd",id:"pError"+errorN});
    $div.text( error[errorN] );
    if( $("#pError"+errorN).length == 0 ) {
        $("#pErrors").append($div);
    }
}

function removePError(errorN) {
    $("#pError"+errorN).remove();
}

function removeAError(errorN) {
    $("#aError"+errorN).remove();
}










