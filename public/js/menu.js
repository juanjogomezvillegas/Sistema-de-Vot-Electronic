$(document).ready(function() {    
    $("#btnNavbarBasicExample").on("click", function() {
        $("div#navbarBasicExample").fadeToggle().animate({"top": "-30px"});
    });
});