$(function() {
    
    $("#label0").hover(function(){
        mostrarMessage("Extensiones permitidas: png, jpg , bmp o gif");
    },function(){
        mostrarMessage("...");
    });
    
    $("#firstName,#lastName").hover(function(){
        mostrarMessage("Un espacio entre palabras y letra capital");
    },function(){
        mostrarMessage("...");
    });
    
    $("#nickName").hover(function(){
        mostrarMessage("Todo tipo de caracter excepto espacios");
    },function(){
        mostrarMessage("...");
    });
    
    $("#email").hover(function(){
        mostrarMessage("ejemplo@dominio.com.mx");
    },function(){
        mostrarMessage("...");
    });
    
    $("#phone").hover(function(){
        mostrarMessage("8 o 10 digitos permitidos (celular/local)");
    },function(){
        mostrarMessage("...");
    });
    
    $("#password_1,#password_2").hover(function() {
        $("#registerMessage ").parent().css("padding-top","1%");
        $("#registerMessage").css("font-size",10.5);
        mostrarMessage("8 caracteres minimos con una mayuscula y numero (caracteres especiales permitidos)");
    },function() {
        $("#registerMessage").parent().css("padding-top","2.5%");
        $("#registerMessage").css("font-size",12);
        mostrarMessage("...");
    });
    
    $("#userLogin").hover(function() {
        mostrarMessage_2("Todo tipo de caracter excepto espacios");
    },function() {
        mostrarMessage_2("...");
    });
    
    $("#passwordLogin").hover(function() {
        mostrarMessage_2("8 caracteres minimos con una mayuscula y numero");
    },function() {
        mostrarMessage_2("...");
    });
    
});

function mostrarMessage(message) {
    $("#registerMessage").text(message);
}

function mostrarMessage_2(message) {
    $("#loginMessage").text(message);
}