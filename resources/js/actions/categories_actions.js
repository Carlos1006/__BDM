$(setCategorieSearch);

function setCategorieSearch() {
    $(".subcategorie").click(subcategorieSearch);
}

function subcategorieSearch() {
    var idSubcategoria = $(this).attr("idSubcategoria");
    var formParam = {
        action:"/__BDM/controller/getAviso.php",
        method:"GET"
    };
    var inputParam = {
        type:"hidden",
        name:"idSubcategoria"
    };
    var $form   = $("<form>" ,formParam );
    var $input  = $("<input>",inputParam);
    $input.val(idSubcategoria);
    $form.append($input);
    $form.submit();
}

