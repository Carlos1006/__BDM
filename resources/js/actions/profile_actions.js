$(function() {
   	//Producto
   	$("#newProduct").click(setInsertForm);
   	$("#cancelNewProduct").click(reload);
   	$(".editProductBtn").click(setUpdateForm);
   	$("#okNewProduct").click(postFormProduct);
	//Aviso
	$("#cancelNewAd").click(reload);
	$("#newAd").click(setInsertForm_2);
	$("#aCategory").change(getSubcategoriasSelect);
	$(".editAdBtn").click(setUpdateForm_2);
});

//Funciones de productos

function setInsertForm() {
   $("#pName").val("").trigger("textchange");
   $("#pPrice").val("").trigger("textchange");
   $("#label-vigenciaProducto").text(getStringCurrentDate());
   $("#pStock").val("").trigger("textchange");
   $("#pShort").text("").trigger("keyup");
   $("#pLong").text("").trigger("keyup");
   
   $("#imgP1").attr("src","/__BDM/img/icons/spinner.gif").attr("idImagen",0);
   $("#imgP2").attr("src","/__BDM/img/icons/spinner.gif").attr("idImagen",0);
   $("#imgP3").attr("src","/__BDM/img/icons/spinner.gif").attr("idImagen",0);
   $("#imgP4").attr("src","/__BDM/img/icons/spinner.gif").attr("idImagen",0);
   $("#imgP5").attr("src","/__BDM/img/icons/spinner.gif").attr("idVideo",0);
   $("#imgP6").attr("src","/__BDM/img/icons/spinner.gif").attr("idVideo",0);
   
   $("#headerNewP").text("Nuevo Producto").attr("idProducto",0);
   $("#okNewProduct").text("Crear producto");
}

function setUpdateForm() {
   var idProducto = parseInt($(this).attr("editaProducto"));
   var parameters = {idProducto:idProducto};
   var ajax = {
            url         :"/__BDM/controller/getProductoEdit.php",
            method      :"POST",
            data        :parameters,
            dataType    :"json"
        };
  var request  = $.ajax(ajax);
  request.done(function(responde) {
	 	console.log(responde);
	  	$("#pName").val(responde.nombreProducto).trigger("textchange");
   		$("#pPrice").val(responde.precioProducto).trigger("textchange");
   		$("#label-vigenciaProducto").text(responde.vigenciaProducto);
   		$("#pStock").val(responde.existenciaProducto).trigger("textchange");
   		$("#pShort").text(responde.descripcionProducto).trigger("keyup");
   		$("#pLong").text(responde.caracteristicaProducto).trigger("keyup");
   		
   		$("#imgP1").attr("src",responde.imagenesProducto[0].pathImagen).attr("idImagen",responde.imagenesProducto[0].idImagen);
   		$("#imgP2").attr("src",responde.imagenesProducto[1].pathImagen).attr("idImagen",responde.imagenesProducto[1].idImagen);
   		$("#imgP3").attr("src",responde.imagenesProducto[2].pathImagen).attr("idImagen",responde.imagenesProducto[2].idImagen);
   		$("#imgP4").attr("src",responde.imagenesProducto[3].pathImagen).attr("idImagen",responde.imagenesProducto[3].idImagen);
   		$("#imgP5").attr("src",responde.videosProducto[0].pathVideo).attr("idVideo",responde.videosProducto[0].idVideo);
   		$("#imgP6").attr("src",responde.videosProducto[1].pathVideo).attr("idVideo",responde.videosProducto[1].idVideo);
   		
   		$("#headerNewP").text("Edita producto").attr("idProducto",responde.idProducto);
   		$("#okNewProduct").text("Actualizar producto");
	 	var $call = $("<div>");
	 	$call.click({toggle:true},toggleNewProductTab);
	 	$call.trigger("click");
	 	$call = null;
  });
  request.fail(function(jqXHR,textStatus) { console.log("Error al traer el producto :"+textStatus);  });
  request.always(function() { console.log("Producto conseguido"); });
}

function reload() {
   location.reload();
}

function getStringCurrentDate() {
   var today = new Date();
   var dd = today.getDate();
   var mm = today.getMonth()+1; //January is 0!
   var yyyy = today.getFullYear();
   
   if(dd<10) dd='0'+dd;
   
   var m = null;
   switch(mm) {
	  case 1: 	m = "Enero" 	 ; break;
	  case 2: 	m = "Febrero" 	 ; break;
	  case 3: 	m = "Marzo" 	 ; break;
	  case 4: 	m = "Abril" 	 ; break;
	  case 5: 	m = "Mayo" 		 ; break;
	  case 6: 	m = "Junio" 	 ; break;
	  case 7: 	m = "Julio" 	 ; break;
	  case 8: 	m = "Agosto" 	 ; break;
	  case 9: 	m = "Septiembre" ; break;
	  case 10: 	m = "Octubre" 	 ; break;
	  case 11: 	m = "Noviembre"  ; break;
	  case 12: 	m = "Diciembre"  ; break;
   }
   return dd+"/"+m+"/"+yyyy;
}

function postFormProduct() {
   	var $idProducto			= $("<input>",{name:"upId"		,type:"hidden"});
   	var $idImagen1			= $("<input>",{name:"upIdImg_1"	,type:"hidden"});
   	var $idImagen2			= $("<input>",{name:"upIdImg_2"	,type:"hidden"});
   	var $idImagen3			= $("<input>",{name:"upIdImg_3"	,type:"hidden"});
   	var $idImagen4			= $("<input>",{name:"upIdImg_4"	,type:"hidden"});
   	var $idVideo1			= $("<input>",{name:"upIdVid_1"	,type:"hidden"});
   	var $idVideo2			= $("<input>",{name:"upIdVid_2"	,type:"hidden"});
   	var $vigenciaProducto	= $("<input>",{name:"upDate"	,type:"hidden"});
 	
   	$idProducto	.val( $("#headerNewP").attr("idProducto") );
   	$idImagen1	.val( $("#imgP1").attr("idImagen") );
   	$idImagen2	.val( $("#imgP2").attr("idImagen") );
   	$idImagen3	.val( $("#imgP3").attr("idImagen") );
   	$idImagen4	.val( $("#imgP4").attr("idImagen") );
   	$idVideo1	.val( $("#imgP5").attr("idVideo") );
   	$idVideo2	.val( $("#imgP6").attr("idVideo") );
   	$vigenciaProducto.val( $("#label-vigenciaProducto").text() );
   	$("#formUploadProduct").append($idProducto,$idImagen1,$idImagen2,$idImagen3,$idImagen4,$idVideo1,$idVideo2,$vigenciaProducto);
   	$("#formUploadProduct").submit();
}

//Funciones de avisos
function getSubcategoriasSelect() {
	var idCategoria = $(this).val();
	var parameters 	= {idCategoria:idCategoria};
	var ajax = {
		url         :"/__BDM/controller/getSubcategoria.php",
		method      :"POST",
		data        :parameters,
		dataType    :"json"
	};
	var request  = $.ajax(ajax);
	request.done(function(responde) {
		$("#aSubcategory").empty();
		var $optionMsg = $("<option value='' disabled='' selected=''>Elige una categoria</option>");
		$("#aSubcategory").append($optionMsg);
		responde.forEach(function(object) {
			
			var $option = $("<option>",{value:object.idSubcategoria});
			$option.text(object.nombreSubcategoria);
			$("#aSubcategory").append($option);
		});
	});
	request.fail(function(jqXHR,textStatus) { console.log("Error al traer las subcategorias :"+textStatus);  });
	request.always(function() { console.log("Las subcategorias se han conseguido"); });
}

function setInsertForm_2() {
	$("#aStock").val("").trigger("textchange");
	$("#aPrice").val("").trigger("textchange");
	$("#label-vigenciaAviso").text(getStringCurrentDate());
	$("#aShort").text("").trigger("keyup");
	$("#aLong").text("").trigger("keyup");
	$("#headerNewA").attr("idAviso",0).text("Nuevo Aviso");
	$("#okNewAd").text("Crear aviso");
}

function setUpdateForm_2() {
	var idAviso = parseInt($(this).attr("editaAviso"));
  	var parameters = {idAviso:idAviso};
  	var ajax = {
  	          url         :"/__BDM/controller/getAvisoEdit.php",
  	          method      :"POST",
  	          data        :parameters,
  	          dataType    :"json"
  	      };
  	var request  = $.ajax(ajax);
  	request.done(function(responde) {
		 	console.log(responde);
			$("#aStock").val("").trigger("textchange");
			$("#aPrice").val("").trigger("textchange");
			$("#label-vigenciaAviso").text(getStringCurrentDate());
			$("#aShort").text("").trigger("keyup");
			$("#aLong").text("").trigger("keyup");
			$("#headerNewA").attr("idAviso",0).text("Edita Aviso");
			$("#okNewAd").text("Actualizar aviso");
  	 	
		 	var $call = $("<div>");
		 	$call.click({toggle:true},toggleNewAdTab);
		 	$call.trigger("click");
		 	$call = null;
  	});
  	request.fail(function(jqXHR,textStatus) { console.log("Error al traer el aviso :"+textStatus);  });
  	request.always(function() { console.log("Aviso conseguido"); });
}
