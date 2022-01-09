$(document).ready(function() {
    
    $("#titolAplicacio").on("change", function() {
        let titolAplicacio = $(this).val();

        $.ajax({
            url: "index.php?r=canviarTitolAplicacio", 
            type: "POST",
            data: { titolAplicacio }
        });

        $("title").html(`Configuration | ${ titolAplicacio }`);
    });
});