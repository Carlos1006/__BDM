var currentCategory = 0 ;

$(subcategory);

function subcategory() {
    $(".categorie").click(getSubcategoriesAJAX);
    $(".subcategorie").click(subcategorie);
    $(".superCategories").perfectScrollbar({suppressScrollX:true});
}

function subcategorie() {
    alert($(this).attr("idSubcategoria"));
}

function getSubcategoriesAJAX() {
    var id = parseInt($(this).attr("idCategoria"));
    if(id != currentCategory) {
        currentCategory = id;
        var father = $(this);
        console.log(id);
        $(".subcategorie").remove();
        var parameters = {
            idCategoria:id
        };
        var ajax = {
            url         :"/__BDM/controller/getSubcategoria.php",
            method      :"POST",
            data        :parameters,
            dataType    :"json"
        };
        var request  = $.ajax(ajax);
        request.done(function(responde) {
            responde.forEach(function(object){
                var $div = $("<div>",{class:"subcategorie",idSubcategoria:object.idSubcategoria});
                $div.text(object.nombreSubcategoria);
                $div.insertAfter(father);
            });
            $(".subcategorie").click(subcategorie);
        });
        request.fail(function(jqXHR,textStatus) { console.log("Error al traer las subcategorias :"+textStatus);  });
        request.always(function() { console.log("Las subcategorias se han conseguido"); });
    } else {
        $(".subcategorie").remove();
        currentCategory = 0 ;
    }
}