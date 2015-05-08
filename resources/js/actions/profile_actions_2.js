$(function() {
	$(".viewProductBtn").click(viewProductPost);
	$(".viewAdBtn").click(viewAdPost);
	$(".deleteProductBtn").click(deleteProductPost);
	$(".deleteAdBtn").click(deleteAdPost);
});

function viewProductPost() {
	var idProducto = $(this).attr("verProducto");
	var $form 	= $("<form>",{method:"POST",action:"/__BDM/controller/viewProducto.php"});
	var $input 	= $("<input>",{type:"hidden",name:"idProducto"});
	$input.val(idProducto);
	$form.append($input);
	$form.submit();
}

function viewAdPost() {
	var idAviso = $(this).attr("verAviso");
	var $form 	= $("<form>",{method:"POST",action:"/__BDM/controller/viewAviso.php"});
	var $input 	= $("<input>",{type:"hidden",name:"idAviso"});
	$input.val(idAviso);
	$form.append($input);
	$form.submit();
}

function deleteProductPost() {
	var idProducto = $(this).attr("borraProducto");
	var $form 	= $("<form>",{method:"POST",action:"/__BDM/controller/deleteProducto.php"});
	var $input 	= $("<input>",{type:"hidden",name:"idProducto"});
	$input.val(idProducto);
	$form.append($input);
	$form.submit();
}

function deleteAdPost() {
	var idAviso = $(this).attr("borraAviso");
	var $form 	= $("<form>",{method:"POST",action:"/__BDM/controller/deleteAviso.php"});
	var $input 	= $("<input>",{type:"hidden",name:"idAviso"});
	$input.val(idAviso);
	$form.append($input);
	$form.submit();
}