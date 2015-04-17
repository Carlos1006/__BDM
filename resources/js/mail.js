var count = 10;

$(setAllMessage);

function setAllMessage() {
    $("#goToMain").click(goMain);
    $(".goToMail").click(redirect);
    
    setInterval(function () {
        count -= 1;
        $(".countToRefresh").text(count);
        if(count == 0) {
            goMain();
        }
    },1000);
}

function goMain() {
    window.location.href = "/__BDM/view/main.php";
}

function redirect() {
    window.location.href = $(this).attr("url");
}