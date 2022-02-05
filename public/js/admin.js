let numUsuaris;
let numCandidats;
let numVots;
let tempsRefresc;
let numEscons;

$(document).ready(function() {
    var mymap = L.map('map').setView([42.2673623,2.9607906], 50);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
	    id: 'mapbox/satellite-streets-v9',
	    tileSize: 512,
	    zoomOffset: -1
    }).addTo(mymap);

    var marker = L.marker([42.2673623,2.9607906]).addTo(mymap);

    tempsRefresc = $("#tempsRefresc").val() * 1000;

    refresc();
    panell = setInterval(refresc, tempsRefresc);

    $("#tempsRefresc").on("change", function() {
        tempsRefresc = $(this).val() * 1000;

        clearInterval(panell);
        panell = setInterval(refresc, tempsRefresc);
    });
    $("#numEscons").on("change", function() {
        numEscons = $(this).val();

        $.ajax({
            url: "index.php?r=actualitzarEscons", 
            type: "POST",
            data: { numEscons }
        });
    });

    $("#itemAdminUsuari").click(function() {
        window.location.assign("index.php?r=llistarUsuaris");
    });
    $("#itemAdminCandidat").click(function() {
        window.location.assign("index.php?r=llistarCandidats");
    });
    $("#itemAdminVots").click(function() {
        window.location.assign("index.php?r=resultats");
    });
});

function refresc() {
    const countUsuaris = $("#itemAdminUsuariNum");
    const countCandidat = $("#itemAdminCandidatNum");
    const countVots = $("#itemAdminVotsNum");

    obtenirCount(countUsuaris, countCandidat, countVots);
};

function obtenirCount(countUsuaris, countCandidat, countVots) {
    $.ajax({
        url: "index.php?r=countUsuaris", 
        type: "POST",
        data: { numUsuaris }, 
        success: (response) => {
            drawResultsUsuaris(countUsuaris, response);
        }
    });
    $.ajax({
        url: "index.php?r=countCandidats", 
        type: "POST",
        data: { numCandidats }, 
        success: (response) => {
            drawResultsCandidats(countCandidat, response);
        }
    });
    $.ajax({
        url: "index.php?r=countVots", 
        type: "POST",
        data: { numVots }, 
        success: (response) => {
            drawResultsVots(countVots, response);
        }
    });
};

function drawResultsUsuaris(countUsuaris, numUsuaris) {
    let tmp;

    tmp = `<p id="itemAdminUsuariNum" class="is-size-2">${ numUsuaris }</p>`;

    countUsuaris.html(tmp);
};

function drawResultsCandidats(countCandidat, numCandidats) {
    let tmp;

    tmp = `<p id="itemAdminCandidatNum" class="is-size-2">${ numCandidats }</p>`;

    countCandidat.html(tmp);
};

function drawResultsVots(countVots, numVots) {
    let tmp;

    tmp = `<p id="itemAdminVotsNum" class="is-size-2">${ numVots }</p>`;

    countVots.html(tmp);
};