$(function(){
    $("#okNewUser").click(actionEditUserForm);
	$("#unsetUser").click(unsetUsuario);
});

function actionEditUserForm() {
    var idUsuario = parseInt($("#usuarioActivoEdicion").text());
    var $hidden   = $("<input>",{type:"hidden",name:"updateId"});
    $hidden.val(idUsuario);
    $("#editUserForm").append($hidden);
    $("#editUserForm").submit();
}

function unsetUsuario() {
	var confirmacion = confirm("¿Seguro de borrar tu usuario?");
	if(confirmacion) {
		$("<form>",{action:"/__BDM/controller/deleteUsuario.php"}).submit(); 
	}
}