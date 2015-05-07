$(function(){
	$(".viewProductBtn").click(viewProductPost);
	$(".viewAdBtn").click(viewAdPost);
	$(".deleteProductBtn").click(deleteProductPost);
	$(".deleteAdBtn").click(deleteAdPost);
});

function viewProductPost() {
	$(this).attr("verProducto");
}

function viewAdPost() {
	$(this).attr("verAviso");
}

function deleteProductPost() {
	$(this).attr("borraProducto");
}

function deleteAdPost() {
	$(this).attr("borraAviso");
}