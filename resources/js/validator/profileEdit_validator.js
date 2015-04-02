var uValidator = {
    nickname:   true,
    imagen:     true,
    nombre:     true,
    apellido:   true,
    email:      true,
    telefono:   true,
    password:   true
};

$(setProfileEditAll);

function setProfileEditAll() {
    //editarUsuario
    $("#uNick")         .on("textchange",validateUNick);
    $("#uFirst")        .on("textchange",{type:"First"},validateUFirstLast);
    $("#uLast")         .on("textchange",{type:"Last"},validateUFirstLast);
    $("#uEmail")        .on("textchange",validateUEmail);
    $("#uPhone")        .on("textchange",validateUPhone);
    $("#uPassword_1")   .on("textchange",validateUPassword);
    $("#label7")        .change(validateUImage);
    validateNewUser();
}

function validateNewUser() {
    if( uValidator.nickname ==true &&
        uValidator.imagen   ==true &&
        uValidator.nombre   ==true &&
        uValidator.apellido ==true &&
        uValidator.email    ==true &&
        uValidator.telefono ==true &&
        uValidator.password ==true 
      )
    {
        $("#okNewUser").attr("disabled",false);
    } else {
        $("#okNewUser").attr("disabled",true);
    }
    
    if(reValidateUser()) {
        $("#okNewUser").attr("disabled",true);
    }
}

function reValidateUser() {
    var devolve = false;
    if( $("#uNick").val() == "" &&
        $("#label7").val() == "" &&
        $("#uFirst").val() == "" &&
        $("#uLast").val() == "" &&
        $("#uEmail").val() == "" &&
        $("#uPhone").val() == "" &&
        $("#uPassword_1").val() == ""
    ) 
    {
        devolve = true;
    }
    return devolve;
}

/*-Prefijo U-*/
function validateUNick() {
    var string = $(this).val();
    var object = $("#vUNick");
    if(string.match(/^[A-z0-9\-\_\.]+$/)) {
        uValidator.nickname = true;
        object.css("background",colorResult.yes);
    } else {
        uValidator.nickname = false;
        object.css("background",colorResult.no);
    }
    if(string=="") {
        uValidator.nickname = true;
        object.css("background",colorResult.wait); 
    }
    validateNewUser();
}

function validateUImage() {
    var string = $(this).val();
    var object = $("#vUImage");
    if(string.match(/.+\.(jpg|png|bmp)/i)) {
        uValidator.imagen = true;
        object.css("background",colorResult.yes);
    } else {
        uValidator.imagen = false;
        object.css("background",colorResult.no);
    }
    if(string=="") {
        uValidator.imagen = true;
        object.css("background",colorResult.wait); 
    }
    validateNewUser();
}

function validateUFirstLast(e) {
    var string = $(this).val();
    var object = $("#vU"+e.data.type);
    if(string.match(/^([A-Z][a-z]+\s?)+$/)) {
        if(e.data.type=="First") {
            uValidator.nombre = true;
        } else if(e.data.type=="Last") {
            uValidator.apellido = true;
        }
        object.css("background",colorResult.yes);
    } else {
        if(e.data.type=="First") {
            uValidator.nombre = false;
        } else if(e.data.type=="Last") {
            uValidator.apellido = false;
        }
        object.css("background",colorResult.no);
    }
    if(string=="") {
        if(e.data.type=="First") {
            uValidator.nombre = true;
        } else if(e.data.type=="Last") {
            uValidator.apellido = true;
        }
        object.css("background",colorResult.wait);
    }
    validateNewUser();
}

function validateUEmail() {
    var string = $(this).val();
    var object = $("#vUEmail");
    if(string.match(/^[a-z0-9\.\-\_]+\@[a-z0-9]+(\.[a-z0-9]+)+$/)) {
        uValidator.email = true;
        object.css("background",colorResult.yes);
    } else {
        uValidator.email = false;
        object.css("background",colorResult.no);
    }
    if(string=="") {
        uValidator.email = true;
        object.css("background",colorResult.wait); 
    }
    validateNewUser();
}

function validateUPhone() {
    var string = $(this).val();
    var object = $("#vUPhone");
    if(string.match(/^([0-9]{8}|[0-9]{10})$/)) {
        uValidator.telefono = true;
        object.css("background",colorResult.yes);
    } else {
        uValidator.telefono = false;
        object.css("background",colorResult.no);
    }
    if(string=="") {
        uValidator.telefono = true;
        object.css("background",colorResult.wait); 
    }
    validateNewUser();
}

function validateUPassword() {
    var string = $("#uPassword_1").val();
    var xtring = $("#uPassword_2").val();
    var object = $("#vUPassword");
    if(string.match(/^(?=(.*[a-z])+)(?=(.*[0-9])+)[0-9A-z\x21-\x7E]{8,}$/) && string==xtring) {
        uValidator.password = true;
        object.css("background",colorResult.yes);
    } else {
        uValidator.password = false;
        object.css("background",colorResult.no);
    }
    if(string=="") {
        uValidator.password = true;
        object.css("background",colorResult.wait);
    }
    validateNewUser();
}