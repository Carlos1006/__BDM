//objeto: resultSearch de header-validator

var search = {
    searchbar:     null,
    text:          null,
    date:          null,
    nick:          null,
    date_r1:       null,
    date_r2:       null,
    price_r1:      null,
    price_r2:      null,
    top_time:      false,
    top_sell:      false,
    top_comment:   false,
    top_exp:       false
};

$(setHeader_Actions);


function setHeader_Actions() {
    setSearch();
    setUserRegister();
}

function setSearch() {
    $("#searchButton").click(evalSearchInput);
}

function setUserRegister() {
    $("#sendRegister").click(runNewUserForm);
}

function runNewUserForm() {
    $("#formNewUser").submit();
}

function evalSearchInput() {
    resetValues();
    var searchBar       = $("#searchBar")               .val();
    var text            = $("#textSearch")              .val();
    var date            = $("#label-busquedaPorFecha")  .text();
    var nick            = $("#nicknameSearch")          .val();
    var date_r1         = $("#label-fechaRangoUno")     .text();
    var date_r2         = $("#label-fechaRangoDos")     .text();
    var price_r1        = $("#priceSearch_1")           .val();
    var price_r2        = $("#priceSearch_2")           .val();
    var top_time        = $("#timeTop")                 .is(':checked');
    var top_sell        = $("#sellTop")                 .is(':checked');
    var top_comment     = $("#commentTop")              .is(':checked');
    var top_exp         = $("#expTop")                  .is(':checked');
    
    var dateCheck       = $("#dateCheckbox")            .is(':checked');
    var textCheck       = $("#textCheckbox")            .is(':checked');
    var nickCheck       = $("#nickCheckbox")            .is(':checked');
    var dateRangeCheck  = $("#dateRangeCheckbox")       .is(':checked');
    var priceRangeCheck = $("#priceRangeCheckbox")      .is(':checked');
        
    if(resultSearch.searchBar) {
        search.searchbar = searchBar;
        createSearchForm_GET("barra",search.searchbar);
    } else if(top_time) {
        search.top_time = true;
        createSearchForm_GET("top","recientes");
    } else if(top_sell) {
        search.top_sell = true;
        createSearchForm_GET("top","vendidos");
    } else if(top_comment) {
        search.top_comment = true;
        createSearchForm_GET("top","comentarios");
    } else if(top_exp) {
        search.top_exp = true;
        createSearchForm_GET("top","caros");
    } else {
        if(resultSearch.text && textCheck) {
            search.text = text;
        }
        if(resultSearch.date && dateCheck) {
            search.date = date;
        }
        if(resultSearch.name && nickCheck) {
            search.nick = nick;
        }
        if(resultSearch.dateRange && dateRangeCheck) {
            search.date_r1 = date_r1;
            search.date_r2 = date_r2;
        }
        if(resultSearch.priceRange && priceRangeCheck) {
            search.price_r1 = price_r1;
            search.price_r2 = price_r2;
        }
        createSearchForm_POST();
    }
}

function resetValues() {
    search.searchbar    = null;
    search.text         = null;
    search.date         = null;
    search.nick         = null;
    search.date_r1      = null;
    search.date_r2      = null;
    search.price_r1     = null;
    search.price_r2     = null;
    search.top_time     = false;
    search.top_sell     = false;
    search.top_comment  = false;
    search.top_exp      = false;
}

function createSearchForm_POST() {
    var $set        = $("<input>",{type:"hidden",name:"set"});
    var $text       = $("<input>",{type:"hidden",name:"texto"});
    var $date       = $("<input>",{type:"hidden",name:"fecha"});
    var $nick       = $("<input>",{type:"hidden",name:"nickname"});
    var $date_r1    = $("<input>",{type:"hidden",name:"fechaRango1"});
    var $date_r2    = $("<input>",{type:"hidden",name:"fechaRango2"});
    var $price_r1   = $("<input>",{type:"hidden",name:"precioRango1"});
    var $price_r2   = $("<input>",{type:"hidden",name:"precioRango2"});
    $set     .val(true);
    $text    .val(search.text);
    $date    .val(search.date);
    $nick    .val(search.nick);
    $date_r1 .val(search.date_r1);
    $date_r2 .val(search.date_r2);
    $price_r1.val(search.price_r1);
    $price_r2.val(search.price_r2);
    var $form = $("<form>",{action:"/__BDM/controller/getAviso.php",method:"POST"});
    $form.append($set,$text,$date,$nick,$date_r1,$date_r2,$price_r1,$price_r2);
    $form.submit(); 
}

function createSearchForm_GET(name,value) {
    var $set        = $("<input>",{type:"hidden",name:"set"});
    var $parameters = $("<input>",{type:"hidden",name:name});
    $set        .val(true);
    $parameters .val(value);    
    var $form = $("<form>",{action:"/__BDM/controller/getAviso.php",method:"GET"});
    $form.append($set,$parameters);
    $form.submit();
}