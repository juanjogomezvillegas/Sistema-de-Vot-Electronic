$(document).ready(function() {
    obtenirResultatPacte();

    crearGrafic();

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

function crearGrafic() {
    $.ajax({
        url: "index.php?r=obtenirResultat", 
        type: "POST",
        success: function(data) {
            let candidats = $.parseJSON(data);

            let etiquetes = new Array();
            let dades = new Array();
            let colors = new Array();

            for (key in candidats) {
                etiquetes.push(candidats[key]["nom"]);
                dades.push(candidats[key]["escons"]);
                colors.push(candidats[key]["color"]);
            };

            const ctx = $('#chart');
            const myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: etiquetes,
                    datasets: [{
                        label: 'Escons',
                        data: dades,
                        backgroundColor: colors,
                        borderColor: colors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'right'
                        }
                    }
                }
            });
        }
    });
};