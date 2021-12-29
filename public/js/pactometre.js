$(document).ready(function() {
    obtenirResultatPacte();

    $(".SelectPosicio").on("change", function(e) {
        let posicioNova = $( e.target ).val();
        let idCandidat = $( e.target ).siblings("input").val();
        
        $.ajax({
            url: "index.php?r=actualitzarPosicio", 
            type: "POST",
            data: { posicioNova,idCandidat }, 
            success: function() {
                obtenirResultatPacte();
            }
        });
    });
});

function obtenirResultatPacte() {
    const votsSi = $("#numVotsSi");
    const votsN0 = $("#numVotsNo");
    const votsAbstencio = $("#numVotsAbstencio");

    $.ajax({
        url: "index.php?r=numVotsSi", 
        type: "POST",
        success: (response) => {
            votsSi.html(`<p id="numVotsSi" class="title is-2 has-text-success">${ response }</p>`);
        }
    });

    $.ajax({
        url: "index.php?r=numVotsNo", 
        type: "POST",
        success: (response) => {
            votsN0.html(`<p id="numVotsNo" class="title is-2 has-text-danger">${ response }</p>`);
        }
    });

    $.ajax({
        url: "index.php?r=numVotsAbstencio", 
        type: "POST",
        success: (response) => {
            votsAbstencio.html(`<p id="numVotsAbstencio" class="title is-2 has-text-light">${ response }</p>`);
        }
    });
};