$(function(){

    $("[type=file]").change(function(){
        var number = $(this).attr("number");
        var file = this.files[0];
        var formdata = new FormData();
        formdata.append("file", file);
        if(file.name.length >= 30) {
            $('#label'+number).text(file.name.substr(0,30) + '..');
        }else {
            $('#label'+number).text(file.name);
        }
    });
});