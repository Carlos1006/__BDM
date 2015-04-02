var error;
error = getErrorJson();

function getErrorJson() {
	var temporal;
	$.ajax({
    	'async': false,
    	'url': "resources/json/errores.json",
    	'dataType': "json",
    	'success': function (data) {
        	temporal = data;
    	}
	});
	return temporal;
}

//clonar objetos
function clone(obj) {
    if (null == obj || "object" != typeof obj) return obj;
    var copy = obj.constructor();
    for (var attr in obj) {
        if (obj.hasOwnProperty(attr)) copy[attr] = obj[attr];
    }
    return copy;
}
