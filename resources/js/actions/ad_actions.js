$(function() {
	$("#sendAnswer").click(function(){
		var descripcion = $.trim($("#questionForm").val());
		if(descripcion != '') {
			var $input 	= $("#questionForm").clone();
			var $form 	= $("<form>",{method:"POST",action:"/__BDM/controller/setPregunta.php"});
			alert("Tu pregunta aparecera al ser contestada");
			$form.append($input).submit();
		}
	});
});