$(function() {
	//Preguntas
	$("#sendAnswer").click(function(){
		var descripcion = $.trim($("#questionForm").val());
		if(descripcion != '') {
			var $input 	= $("#questionForm").clone();
			var $form 	= $("<form>",{method:"POST",action:"/__BDM/controller/setPregunta.php"});
			alert("Tu pregunta aparecera al ser contestada");
			$form.append($input).submit();
		}
	});
	
	//Comprar Aviso
	$("#buyAdBtn").click(function(){
		$(".superSale").show();
		var cantidad = parseInt($("#mainStock").text());
		$("#stockToBuy").text(cantidad);
		var precio = parseFloat(clearComas($("#priceAdToBuy").text()));
		$("#totalToPay").text(precio*cantidad);
		$("#headerConfirmation").addClass('change').attr('data-content',"("+cantidad+")");
	});
	
	$("#cancelBuyAd").click(function(){
		$(".superSale").hide();
	});
	
	$("#okBuyAd").click(function(){
		var idMetodo = parseInt($("#paymentSelect").val());
		var cantidad = parseInt($("#mainStock").text());
		var $input_1 = $("<input>",{type:"hidden",name:"metodo"});
		var $input_2 = $("<input>",{type:"hidden",name:"cantidad"});
		$input_1.val(idMetodo);
		$input_2.val(cantidad);
		var $form	 = $("<form>",{action:"/__BDM/controller/setSolicitud.php",method:"POST"});
		if(idMetodo != 0 && !isNaN(idMetodo) ) {
			$form.append($input_1,$input_2).submit();
		}
	});
	
	
	
	
});

function clearComas(string) {
	var regex = /\,/g
	string = string.replace(regex,"");
	return string;
}