	var mes = 0;
	var diasMax = 35;

	function agregaAnios_busquedaPorFecha() {
		for (var i=2030; i >= 1970; i--) {
			var anio = "<option value="+i+">"+i+"</option>";
			$("#anio-busquedaPorFecha").append(anio);
		}
	}
	
	function agregaDias_busquedaPorFecha() {
		for (var i=1; i <= 35 ; i++) {
			var padi = pad(i);
			var dia = "<div class='day day-busquedaPorFecha day-busquedaPorFecha"+i+" dia"+i+"'>"+padi+"</div>";
		  	$("#dia-busquedaPorFecha").append(dia);
		}
	}
	
	function clasesEscondidas_busquedaPorFecha(estaNo) {
		var devolver = new Array();
		
		for (var i=1; i <= 12; i++) {
			if(i!=estaNo) {
				devolver.push("."+i+"busquedaPorFecha");
			}
		}
		devolver = devolver.join();
		return devolver;
	}
	
	function claseMostrar_busquedaPorFecha(estaSi) {
		var devolver = "."+estaSi+"busquedaPorFecha";
		return devolver;
	}
	
	function cambioMes_busquedaPorFecha() {
		var mesEscondido = clasesEscondidas_busquedaPorFecha(mes);
		var mesMostrando = claseMostrar_busquedaPorFecha(mes);
		$(mesEscondido).hide();
		$(mesMostrando).show();
	}
	
	function aumetaMes_busquedaPorFecha() {
		mes++;
		if(mes == 13) {
			mes = 1; 
		}
		cambioMes_busquedaPorFecha();
		obtenDias_busquedaPorFecha();
	}
	
	function disminuyeMes_busquedaPorFecha() {
		mes--;
		if(mes == 0) {
			mes = 12; 
		}
		cambioMes_busquedaPorFecha();
		obtenDias_busquedaPorFecha();
	}
	
	function leap(year) {
		var leap = false;
			if(year%4 != 0) {
				leap = false;
			} else if (year%100 != 0) {
				leap = true;
			} else if (year%400 != 0) {
				leap = false;
			} else {
				leap = true;
			}
		return leap	;
	}
	
	function obtenDias_busquedaPorFecha() {
		var dias = $("."+mes+"busquedaPorFecha").attr("dias");
		imprimeDias_busquedaPorFecha(dias);
	}
	
	function pad(d) {
    	return (d < 10) ? '0' + d.toString() : d.toString();
	}
	
	function imprimeDias_busquedaPorFecha(dias_) {
		var diasNo = diasMax - dias_;
		var dias = dias_;
		if(mes==2) {
			var year = $("#anio-busquedaPorFecha").val();
			year = parseInt(year);
			if(leap(year)) {
				dias++;	
				diasNo--;
			}
		}
		$(".day-busquedaPorFecha").removeClass("no");
		
		for(var i=1 ; i<=35 ; i++) {
			if(i > dias) {
				$(".day-busquedaPorFecha"+i).addClass("no");
			}
		}
		pintaDia_busquedaPorFecha();
	}
	
	function fechaActual_busquedaPorFecha() {
		var date = new Date();
		var currentYear = date.getFullYear();
		var currentMonth = date.getMonth();
		var currentDay = date.getDate();
		mes = currentMonth+1;
		$("#anio-busquedaPorFecha").val(currentYear);
		$(".day-busquedaPorFecha"+currentDay).addClass("hoy");
		
		var fechaFinal_busquedaPorFecha = pad(currentDay)+"/"+$("."+mes+"busquedaPorFecha").text()+"/"+currentYear;
		$("#label-busquedaPorFecha").text(fechaFinal_busquedaPorFecha);
	}
	
	function pintaDia_busquedaPorFecha() {
		$(".day-busquedaPorFecha").removeClass("hoy");
		var date = new Date();
		var currentMonth = date.getMonth();
		currentMonth++;
		var anioSeleccionado = $("#anio-busquedaPorFecha").val();
		var currentYear = date.getFullYear();
		if(mes == currentMonth && currentYear == anioSeleccionado) {
			var currentDay = date.getDate();
			$(".day-busquedaPorFecha"+currentDay).addClass("hoy");
		}
	}
	
	function fechaFinal_busquedaPorFecha(diaClick) {
		var dd = diaClick;
		var mm = $("."+mes+"busquedaPorFecha").text();
		var yy = $("#anio-busquedaPorFecha").val();
		var fechaFinal_busquedaPorFecha = dd+"/"+mm+"/"+yy;
		$("#label-busquedaPorFecha").text(fechaFinal_busquedaPorFecha);
	}
	
	function toogleDate_busquedaPorFecha() {
		$("#fecha-busquedaPorFecha").toggle();
	}

	$(function() {
		toogleDate_busquedaPorFecha();
		agregaDias_busquedaPorFecha();
		agregaAnios_busquedaPorFecha();
		fechaActual_busquedaPorFecha();
		cambioMes_busquedaPorFecha();
		obtenDias_busquedaPorFecha();
		
		$("#mesSiguiente-busquedaPorFecha").click(function() {
			aumetaMes_busquedaPorFecha();
		});
		
		$("#mesAnterior-busquedaPorFecha").click(function() {
			disminuyeMes_busquedaPorFecha();
		});
		
		$("#anio-busquedaPorFecha").change(function() {
			obtenDias_busquedaPorFecha(mes);
		});
		
		$(".day-busquedaPorFecha").click(function() {
			var diaClick = $(this).text();
			fechaFinal_busquedaPorFecha(diaClick);
			toogleDate_busquedaPorFecha();
		});
		
		$("#label-busquedaPorFecha").click(function(){
			toogleDate_busquedaPorFecha();
		});
		
	});
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	var mes_fechaRangoUno = 0;
	
	function agregaAnios_fechaRangoUno() {
		for (var i=2030; i >= 1970; i--) {
			var anio = "<option value="+i+">"+i+"</option>";
			$("#anio-fechaRangoUno").append(anio);
		}
	}
	
	function agregaDias_fechaRangoUno() {
		for (var i=1; i <= 35 ; i++) {
			var padi = pad(i);
			var dia = "<div class='day day-fechaRangoUno day-fechaRangoUno"+i+" dia"+i+"'>"+padi+"</div>";
		  	$("#dia-fechaRangoUno").append(dia);
		}
	}
	
	function clasesEscondidas_fechaRangoUno(estaNo) {
		var devolver = new Array();
		
		for (var i=1; i <= 12; i++) {
			if(i!=estaNo) {
				devolver.push("."+i+"fechaRangoUno");
			}
		}
		devolver = devolver.join();
		return devolver;
	}
	
	function claseMostrar_fechaRangoUno(estaSi) {
		var devolver = "."+estaSi+"fechaRangoUno";
		return devolver;
	}
	
	function cambioMes_fechaRangoUno() {
		var mesEscondido = clasesEscondidas_fechaRangoUno(mes);
		var mesMostrando = claseMostrar_fechaRangoUno(mes);
		$(mesEscondido).hide();
		$(mesMostrando).show();
	}
	
	function fechaRangoUno() {
		var mesEscondido = clasesEscondidas_fechaRangoUno(mes);
		var mesMostrando = claseMostrar_fechaRangoUno(mes);
		$(mesEscondido).hide();
		$(mesMostrando).show();
	}
	
	function aumetaMes_fechaRangoUno() {
		mes++;
		if(mes == 13) {
			mes = 1; 
		}
		cambioMes_fechaRangoUno();
		obtenDias_fechaRangoUno();
	}
	
	function disminuyeMes_fechaRangoUno() {
		mes--;
		if(mes == 0) {
			mes = 12; 
		}
		cambioMes_fechaRangoUno();
		obtenDias_fechaRangoUno();
	}
	
	function obtenDias_fechaRangoUno() {
		var dias = $("."+mes+"fechaRangoUno").attr("dias");
		imprimeDias_fechaRangoUno(dias);
	}
	
	function imprimeDias_fechaRangoUno(dias_) {
		var diasNo = diasMax - dias_;
		var dias = dias_;
		if(mes==2) {
			var year = $("#anio-fechaRangoUno").val();
			year = parseInt(year);
			if(leap(year)) {
				dias++;	
				diasNo--;
			}
		}
		$(".day-fechaRangoUno").removeClass("no");
		
		for(var i=1 ; i<=35 ; i++) {
			if(i > dias) {
				$(".day-fechaRangoUno"+i).addClass("no");
			}
		}
		pintaDia_fechaRangoUno();
	}
	
	function fechaActual_fechaRangoUno() {
		var date = new Date();
		var currentYear = date.getFullYear();
		var currentMonth = date.getMonth();
		var currentDay = date.getDate();
		mes = currentMonth+1;
		$("#anio-fechaRangoUno").val(currentYear);
		$(".day-fechaRangoUno"+currentDay).addClass("hoy");
		
		var fechaFinal_fechaRangoUno = pad(currentDay)+"/"+$("."+mes+"fechaRangoUno").text()+"/"+currentYear;
		$("#label-fechaRangoUno").text(fechaFinal_fechaRangoUno);
	}
	
	function pintaDia_fechaRangoUno() {
		$(".day-fechaRangoUno").removeClass("hoy");
		var date = new Date();
		var currentMonth = date.getMonth();
		currentMonth++;
		var anioSeleccionado = $("#anio-fechaRangoUno").val();
		var currentYear = date.getFullYear();
		if(mes == currentMonth && currentYear == anioSeleccionado) {
			var currentDay = date.getDate();
			$(".day-fechaRangoUno"+currentDay).addClass("hoy");
		}
	}
	
	function fechaFinal_fechaRangoUno(diaClick) {
		var dd = diaClick;
		var mm = $("."+mes+"fechaRangoUno").text();
		var yy = $("#anio-fechaRangoUno").val();
		var fechaFinal_fechaRangoUno = dd+"/"+mm+"/"+yy;
		$("#label-fechaRangoUno").text(fechaFinal_fechaRangoUno);
	}
	
	function toogleDate_fechaRangoUno() {
		$("#fecha-fechaRangoUno").toggle();
	}

	$(function() {
		toogleDate_fechaRangoUno();
		agregaDias_fechaRangoUno();
		agregaAnios_fechaRangoUno();
		fechaActual_fechaRangoUno();
		cambioMes_fechaRangoUno();
		obtenDias_fechaRangoUno();
		
		$("#mesSiguiente-fechaRangoUno").click(function() {
			aumetaMes_fechaRangoUno();
		});
		
		$("#mesAnterior-fechaRangoUno").click(function() {
			disminuyeMes_fechaRangoUno();
		});
		
		$("#anio-fechaRangoUno").change(function() {
			obtenDias_fechaRangoUno(mes);
		});
		
		$(".day-fechaRangoUno").click(function() {
			var diaClick = $(this).text();
			fechaFinal_fechaRangoUno(diaClick);
			toogleDate_fechaRangoUno();
		});
		
		$("#label-fechaRangoUno").click(function(){
			toogleDate_fechaRangoUno();
		});
		
	});	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	var mes_fechaRangoDos = 0;
	
	function agregaAnios_fechaRangoDos() {
		for (var i=2030; i >= 1970; i--) {
			var anio = "<option value="+i+">"+i+"</option>";
			$("#anio-fechaRangoDos").append(anio);
		}
	}
	
	function agregaDias_fechaRangoDos() {
		for (var i=1; i <= 35 ; i++) {
			var padi = pad(i);
			var dia = "<div class='day day-fechaRangoDos day-fechaRangoDos"+i+" dia"+i+"'>"+padi+"</div>";
		  	$("#dia-fechaRangoDos").append(dia);
		}
	}
	
	function clasesEscondidas_fechaRangoDos(estaNo) {
		var devolver = new Array();
		
		for (var i=1; i <= 12; i++) {
			if(i!=estaNo) {
				devolver.push("."+i+"fechaRangoDos");
			}
		}
		devolver = devolver.join();
		return devolver;
	}
	
	function claseMostrar_fechaRangoDos(estaSi) {
		var devolver = "."+estaSi+"fechaRangoDos";
		return devolver;
	}
	
	function cambioMes_fechaRangoDos() {
		var mesEscondido = clasesEscondidas_fechaRangoDos(mes);
		var mesMostrando = claseMostrar_fechaRangoDos(mes);
		$(mesEscondido).hide();
		$(mesMostrando).show();
	}
	
	function fechaRangoDos() {
		var mesEscondido = clasesEscondidas_fechaRangoDos(mes);
		var mesMostrando = claseMostrar_fechaRangoDos(mes);
		$(mesEscondido).hide();
		$(mesMostrando).show();
	}
	
	function aumetaMes_fechaRangoDos() {
		mes++;
		if(mes == 13) {
			mes = 1; 
		}
		cambioMes_fechaRangoDos();
		obtenDias_fechaRangoDos();
	}
	
	function disminuyeMes_fechaRangoDos() {
		mes--;
		if(mes == 0) {
			mes = 12; 
		}
		cambioMes_fechaRangoDos();
		obtenDias_fechaRangoDos();
	}
	
	function obtenDias_fechaRangoDos() {
		var dias = $("."+mes+"fechaRangoDos").attr("dias");
		imprimeDias_fechaRangoDos(dias);
	}
	
	function imprimeDias_fechaRangoDos(dias_) {
		var diasNo = diasMax - dias_;
		var dias = dias_;
		if(mes==2) {
			var year = $("#anio-fechaRangoDos").val();
			year = parseInt(year);
			if(leap(year)) {
				dias++;	
				diasNo--;
			}
		}
		$(".day-fechaRangoDos").removeClass("no");
		
		for(var i=1 ; i<=35 ; i++) {
			if(i > dias) {
				$(".day-fechaRangoDos"+i).addClass("no");
			}
		}
		pintaDia_fechaRangoDos();
	}
	
	function fechaActual_fechaRangoDos() {
		var date = new Date();
		var currentYear = date.getFullYear();
		var currentMonth = date.getMonth();
		var currentDay = date.getDate();
		mes = currentMonth+1;
		$("#anio-fechaRangoDos").val(currentYear);
		$(".day-fechaRangoDos"+currentDay).addClass("hoy");
		
		var fechaFinal_fechaRangoDos = pad(currentDay)+"/"+$("."+mes+"fechaRangoDos").text()+"/"+currentYear;
		$("#label-fechaRangoDos").text(fechaFinal_fechaRangoDos);
	}
	
	function pintaDia_fechaRangoDos() {
		$(".day-fechaRangoDos").removeClass("hoy");
		var date = new Date();
		var currentMonth = date.getMonth();
		currentMonth++;
		var anioSeleccionado = $("#anio-fechaRangoDos").val();
		var currentYear = date.getFullYear();
		if(mes == currentMonth && currentYear == anioSeleccionado) {
			var currentDay = date.getDate();
			$(".day-fechaRangoDos"+currentDay).addClass("hoy");
		}
	}
	
	function fechaFinal_fechaRangoDos(diaClick) {
		var dd = diaClick;
		var mm = $("."+mes+"fechaRangoDos").text();
		var yy = $("#anio-fechaRangoDos").val();
		var fechaFinal_fechaRangoDos = dd+"/"+mm+"/"+yy;
		$("#label-fechaRangoDos").text(fechaFinal_fechaRangoDos);
	}
	
	function toogleDate_fechaRangoDos() {
		$("#fecha-fechaRangoDos").toggle();
	}

	$(function() {
		toogleDate_fechaRangoDos();
		agregaDias_fechaRangoDos();
		agregaAnios_fechaRangoDos();
		fechaActual_fechaRangoDos();
		cambioMes_fechaRangoDos();
		obtenDias_fechaRangoDos();
		
		$("#mesSiguiente-fechaRangoDos").click(function() {
			aumetaMes_fechaRangoDos();
		});
		
		$("#mesAnterior-fechaRangoDos").click(function() {
			disminuyeMes_fechaRangoDos();
		});
		
		$("#anio-fechaRangoDos").change(function() {
			obtenDias_fechaRangoDos(mes);
		});
		
		$(".day-fechaRangoDos").click(function() {
			var diaClick = $(this).text();
			fechaFinal_fechaRangoDos(diaClick);
			toogleDate_fechaRangoDos();
		});
		
		$("#label-fechaRangoDos").click(function(){
			toogleDate_fechaRangoDos();
		});
		
	});	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	var mes_vigenciaProducto = 0;
	
	function agregaAnios_vigenciaProducto() {
		for (var i=2030; i >= 1970; i--) {
			var anio = "<option value="+i+">"+i+"</option>";
			$("#anio-vigenciaProducto").append(anio);
		}
	}
	
	function agregaDias_vigenciaProducto() {
		for (var i=1; i <= 35 ; i++) {
			var padi = pad(i);
			var dia = "<div class='day day-vigenciaProducto day-vigenciaProducto"+i+" dia"+i+"'>"+padi+"</div>";
		  	$("#dia-vigenciaProducto").append(dia);
		}
	}
	
	function clasesEscondidas_vigenciaProducto(estaNo) {
		var devolver = new Array();
		
		for (var i=1; i <= 12; i++) {
			if(i!=estaNo) {
				devolver.push("."+i+"vigenciaProducto");
			}
		}
		devolver = devolver.join();
		return devolver;
	}
	
	function claseMostrar_vigenciaProducto(estaSi) {
		var devolver = "."+estaSi+"vigenciaProducto";
		return devolver;
	}
	
	function cambioMes_vigenciaProducto() {
		var mesEscondido = clasesEscondidas_vigenciaProducto(mes);
		var mesMostrando = claseMostrar_vigenciaProducto(mes);
		$(mesEscondido).hide();
		$(mesMostrando).show();
	}
	
	function vigenciaProducto() {
		var mesEscondido = clasesEscondidas_vigenciaProducto(mes);
		var mesMostrando = claseMostrar_vigenciaProducto(mes);
		$(mesEscondido).hide();
		$(mesMostrando).show();
	}
	
	function aumetaMes_vigenciaProducto() {
		mes++;
		if(mes == 13) {
			mes = 1; 
		}
		cambioMes_vigenciaProducto();
		obtenDias_vigenciaProducto();
	}
	
	function disminuyeMes_vigenciaProducto() {
		mes--;
		if(mes == 0) {
			mes = 12; 
		}
		cambioMes_vigenciaProducto();
		obtenDias_vigenciaProducto();
	}
	
	function obtenDias_vigenciaProducto() {
		var dias = $("."+mes+"vigenciaProducto").attr("dias");
		imprimeDias_vigenciaProducto(dias);
	}
	
	function imprimeDias_vigenciaProducto(dias_) {
		var diasNo = diasMax - dias_;
		var dias = dias_;
		if(mes==2) {
			var year = $("#anio-vigenciaProducto").val();
			year = parseInt(year);
			if(leap(year)) {
				dias++;	
				diasNo--;
			}
		}
		$(".day-vigenciaProducto").removeClass("no");
		
		for(var i=1 ; i<=35 ; i++) {
			if(i > dias) {
				$(".day-vigenciaProducto"+i).addClass("no");
			}
		}
		pintaDia_vigenciaProducto();
	}
	
	function fechaActual_vigenciaProducto() {
		var date = new Date();
		var currentYear = date.getFullYear();
		var currentMonth = date.getMonth();
		var currentDay = date.getDate();
		mes = currentMonth+1;
		$("#anio-vigenciaProducto").val(currentYear);
		$(".day-vigenciaProducto"+currentDay).addClass("hoy");
		
		var fechaFinal_vigenciaProducto = pad(currentDay)+"/"+$("."+mes+"vigenciaProducto").text()+"/"+currentYear;
		$("#label-vigenciaProducto").text(fechaFinal_vigenciaProducto);
	}
	
	function pintaDia_vigenciaProducto() {
		$(".day-vigenciaProducto").removeClass("hoy");
		var date = new Date();
		var currentMonth = date.getMonth();
		currentMonth++;
		var anioSeleccionado = $("#anio-vigenciaProducto").val();
		var currentYear = date.getFullYear();
		if(mes == currentMonth && currentYear == anioSeleccionado) {
			var currentDay = date.getDate();
			$(".day-vigenciaProducto"+currentDay).addClass("hoy");
		}
	}
	
	function fechaFinal_vigenciaProducto(diaClick) {
		var dd = diaClick;
		var mm = $("."+mes+"vigenciaProducto").text();
		var yy = $("#anio-vigenciaProducto").val();
		var fechaFinal_vigenciaProducto = dd+"/"+mm+"/"+yy;
		$("#label-vigenciaProducto").text(fechaFinal_vigenciaProducto);
	}
	
	function toogleDate_vigenciaProducto() {
		$("#fecha-vigenciaProducto").toggle();
	}

	$(function() {
		toogleDate_vigenciaProducto();
		agregaDias_vigenciaProducto();
		agregaAnios_vigenciaProducto();
		fechaActual_vigenciaProducto();
		cambioMes_vigenciaProducto();
		obtenDias_vigenciaProducto();
		
		$("#mesSiguiente-vigenciaProducto").click(function() {
			aumetaMes_vigenciaProducto();
		});
		
		$("#mesAnterior-vigenciaProducto").click(function() {
			disminuyeMes_vigenciaProducto();
		});
		
		$("#anio-vigenciaProducto").change(function() {
			obtenDias_vigenciaProducto(mes);
		});
		
		$(".day-vigenciaProducto").click(function() {
			var diaClick = $(this).text();
			fechaFinal_vigenciaProducto(diaClick);
			toogleDate_vigenciaProducto();
		});
		
		$("#label-vigenciaProducto").click(function(){
			toogleDate_vigenciaProducto();
		});
		
	});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	var mes_vigenciaAviso = 0;
	
	function agregaAnios_vigenciaAviso() {
		for (var i=2030; i >= 1970; i--) {
			var anio = "<option value="+i+">"+i+"</option>";
			$("#anio-vigenciaAviso").append(anio);
		}
	}
	
	function agregaDias_vigenciaAviso() {
		for (var i=1; i <= 35 ; i++) {
			var padi = pad(i);
			var dia = "<div class='day day-vigenciaAviso day-vigenciaAviso"+i+" dia"+i+"'>"+padi+"</div>";
		  	$("#dia-vigenciaAviso").append(dia);
		}
	}
	
	function clasesEscondidas_vigenciaAviso(estaNo) {
		var devolver = new Array();
		
		for (var i=1; i <= 12; i++) {
			if(i!=estaNo) {
				devolver.push("."+i+"vigenciaAviso");
			}
		}
		devolver = devolver.join();
		return devolver;
	}
	
	function claseMostrar_vigenciaAviso(estaSi) {
		var devolver = "."+estaSi+"vigenciaAviso";
		return devolver;
	}
	
	function cambioMes_vigenciaAviso() {
		var mesEscondido = clasesEscondidas_vigenciaAviso(mes);
		var mesMostrando = claseMostrar_vigenciaAviso(mes);
		$(mesEscondido).hide();
		$(mesMostrando).show();
	}
	
	function vigenciaAviso() {
		var mesEscondido = clasesEscondidas_vigenciaAviso(mes);
		var mesMostrando = claseMostrar_vigenciaAviso(mes);
		$(mesEscondido).hide();
		$(mesMostrando).show();
	}
	
	function aumetaMes_vigenciaAviso() {
		mes++;
		if(mes == 13) {
			mes = 1; 
		}
		cambioMes_vigenciaAviso();
		obtenDias_vigenciaAviso();
	}
	
	function disminuyeMes_vigenciaAviso() {
		mes--;
		if(mes == 0) {
			mes = 12; 
		}
		cambioMes_vigenciaAviso();
		obtenDias_vigenciaAviso();
	}
	
	function obtenDias_vigenciaAviso() {
		var dias = $("."+mes+"vigenciaAviso").attr("dias");
		imprimeDias_vigenciaAviso(dias);
	}
	
	function imprimeDias_vigenciaAviso(dias_) {
		var diasNo = diasMax - dias_;
		var dias = dias_;
		if(mes==2) {
			var year = $("#anio-vigenciaAviso").val();
			year = parseInt(year);
			if(leap(year)) {
				dias++;	
				diasNo--;
			}
		}
		$(".day-vigenciaAviso").removeClass("no");
		
		for(var i=1 ; i<=35 ; i++) {
			if(i > dias) {
				$(".day-vigenciaAviso"+i).addClass("no");
			}
		}
		pintaDia_vigenciaAviso();
	}
	
	function fechaActual_vigenciaAviso() {
		var date = new Date();
		var currentYear = date.getFullYear();
		var currentMonth = date.getMonth();
		var currentDay = date.getDate();
		mes = currentMonth+1;
		$("#anio-vigenciaAviso").val(currentYear);
		$(".day-vigenciaAviso"+currentDay).addClass("hoy");
		
		var fechaFinal_vigenciaAviso = pad(currentDay)+"/"+$("."+mes+"vigenciaAviso").text()+"/"+currentYear;
		$("#label-vigenciaAviso").text(fechaFinal_vigenciaAviso);
	}
	
	function pintaDia_vigenciaAviso() {
		$(".day-vigenciaAviso").removeClass("hoy");
		var date = new Date();
		var currentMonth = date.getMonth();
		currentMonth++;
		var anioSeleccionado = $("#anio-vigenciaAviso").val();
		var currentYear = date.getFullYear();
		if(mes == currentMonth && currentYear == anioSeleccionado) {
			var currentDay = date.getDate();
			$(".day-vigenciaAviso"+currentDay).addClass("hoy");
		}
	}
	
	function fechaFinal_vigenciaAviso(diaClick) {
		var dd = diaClick;
		var mm = $("."+mes+"vigenciaAviso").text();
		var yy = $("#anio-vigenciaAviso").val();
		var fechaFinal_vigenciaAviso = dd+"/"+mm+"/"+yy;
		$("#label-vigenciaAviso").text(fechaFinal_vigenciaAviso);
	}
	
	function toogleDate_vigenciaAviso() {
		$("#fecha-vigenciaAviso").toggle();
	}

	$(function() {
		toogleDate_vigenciaAviso();
		agregaDias_vigenciaAviso();
		agregaAnios_vigenciaAviso();
		fechaActual_vigenciaAviso();
		cambioMes_vigenciaAviso();
		obtenDias_vigenciaAviso();
		
		$("#mesSiguiente-vigenciaAviso").click(function() {
			aumetaMes_vigenciaAviso();
		});
		
		$("#mesAnterior-vigenciaAviso").click(function() {
			disminuyeMes_vigenciaAviso();
		});
		
		$("#anio-vigenciaAviso").change(function() {
			obtenDias_vigenciaAviso(mes);
		});
		
		$(".day-vigenciaAviso").click(function() {
			var diaClick = $(this).text();
			fechaFinal_vigenciaAviso(diaClick);
			toogleDate_vigenciaAviso();
		});
		
		$("#label-vigenciaAviso").click(function(){
			toogleDate_vigenciaAviso();
		});
		
	});