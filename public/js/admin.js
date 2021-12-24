let numUsuaris;
let numCandidats;
let numVots;

$(document).ready(function() {
    const countUsuaris = $("#itemAdminUsuariNum");
    const countCandidat = $("#itemAdminCandidatNum");
    const countVots = $("#itemAdminVotsNum");

    obtenirCount(countUsuaris, countCandidat, countVots);

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