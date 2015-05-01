$(function(){
    $("#okNewUser").click(actionEditUserForm);
});

function actionEditUserForm() {
    var idUsuario = parseInt($("#usuarioActivoEdicion").text());
    var $hidden   = $("<input>",{type:"hidden",name:"updateId"});
    $hidden.val(idUsuario);
    $("#editUserForm").append($hidden);
    $("#editUserForm").submit();
}