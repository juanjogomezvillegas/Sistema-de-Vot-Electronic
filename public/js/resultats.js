$(document).ready(function() {
    graficResultats();

    $("#botoReiniciarDades, #btnCloseModal, #btnCancelaModal").click(function() {
        $("#modalReiniciarDades").toggleClass("is-active");
    });
});

function graficResultats() {
    $.ajax({
        url: "index.php?r=obtenirResultatsGrafic", 
        type: "POST",
        success: function(data) {
            let candidats = $.parseJSON(data);

            $.ajax({
                url: "index.php?r=countCandidats", 
                type: "POST",
                success: (response) => {
                    let etiquetes = new Array();
                    let dades = new Array();

                    for (let i = 1; i <= response; i++) {
                        etiquetes.push(candidats[i]["nom"]);
                        dades.push(candidats[i]["escons"]);
                        console.table(candidats[i]);
                    }
                    
                    const ctx = $('#myChart');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: etiquetes,
                            datasets: [{
                                label: 'Escons Obtinguts',
                                data: dades,
                                backgroundColor: [
                                    'rgba(50, 115, 220, 0.5)'
                                ],
                                borderColor: [
                                    'rgba(50, 115, 220, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            indexAxis: 'y',
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            });
        }
    });
};