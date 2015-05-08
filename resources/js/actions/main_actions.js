var sesion = {
    nickname:null,
    imagen:null,
    nombre:null,
    apellido:null,
    email:null,
    telefono:null
};

$(function() { 
    saveSesion();
    $(".ad").mouseenter(getUsuarioAjax);
    $(".adsContainer").mouseleave(resetSesion);
	$(".ad").click(goTo);
});

function resetSesion() {
    $(".infoHeader").text(sesion.nickname);
    $("#sessionName").text(sesion.nombre);
    $("#sessionLast").text(sesion.apellido);
    $("#sessionEmail").text(sesion.email);
    $("#sessionPhone").text(sesion.telefono);
    $("#sessionImage").attr("src",sesion.imagen);
    $("#sessionImage").removeClass("hoverSqr");
}

function saveSesion() {
    sesion.imagen   = $("#sessionImage").attr("src");
    sesion.nickname = $.trim(
                        $(".infoHeader").text()
                      );
    sesion.nombre   = $("#sessionName").text();
    sesion.apellido = $("#sessionLast").text();
    sesion.email    = $("#sessionEmail").text();
    sesion.telefono = $("#sessionPhone").text();
}

function getUsuarioAjax() {
    var idAviso = parseInt( $(this).attr("idAviso") );
    var parameters = {
        idAviso:idAviso
    };
    var ajax = {
        url         :"/__BDM/controller/getUsuario.php",
        method      :"POST",
            data        :parameters,
            dataType    :"json"
        };
    var request  = $.ajax(ajax);
    request.done(function(responde) {
        console.log(responde);
        $(".infoHeader").text(responde.nicknameUsuario);
        $("#sessionName").text(responde.nombreUsuario);
        $("#sessionLast").text(responde.apellidoUsuario);
        $("#sessionEmail").text(responde.emailUsuario);
        $("#sessionPhone").text(responde.telefonoUsuario);
        $("#sessionImage").attr("src","data:image/png;base64,"+responde.avatarUsuario);
        $("#sessionImage").addClass("hoverSqr");
    });
    request.fail(function(jqXHR,textStatus) { console.log("Error al traer el usuario :"+textStatus);  });
    request.always(function() { console.log("El usuario se ha conseguido"); });
}

function goTo() {
	var idAviso = $(this).attr("idAviso");
	var $form 	= $("<form>",{method:"POST",action:"/__BDM/controller/viewAviso.php"});
	var $input 	= $("<input>",{type:"hidden",name:"idAviso"});
	$input.val(idAviso);
	$form.append($input);
	$form.submit();
}