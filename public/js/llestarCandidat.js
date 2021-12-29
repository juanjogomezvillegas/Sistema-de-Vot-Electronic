$(document).ready(function() {

    $("#botoCrearCandidat, #btnCloseModal1, #btnCancelaModal1").click(function() {
        $("#modalCrearCandidat").toggleClass("is-active");
    });

    $("#btnCloseModal2, #btnCancelaModal2").click(function() {
        $("#modalEditarCandidat").toggleClass("is-active");
    });

    $("#btnCloseModal3, #btnCancelaModal3").click(function() {
        $("#modalEsborrarCandidat").toggleClass("is-active");
    });

    $(".editaCandidat").click(function(e) {
        let idCandidat = $( e.target ).siblings("input").val();

        $.ajax({
            url: "index.php?r=obtenirDadesCandidat", 
            type: "POST",
            data: { idCandidat }, 
            success: function(data) {
                let dadesCandidat = $.parseJSON(data);

                $("#cosFormEditaCandidat").children().remove();

                $("#cosFormEditaCandidat").append(`<input type="hidden" name="idCandidat" value="${ dadesCandidat["id"] }">
                <div class="field">
                    <label class="label">Nom i Cognoms</label>
                    <div class="control">
                        <input id="nomCandidat" name="nomCandidat" value="${ dadesCandidat["nom"] }" class="input" type="text" placeholder="Nom i Cognoms">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Lema de Campanya</label>
                    <div class="control">
                        <input id="lemaCampanya" name="lemaCampanya" value="${ dadesCandidat["lema_campanya"] }" class="input" type="text" placeholder="Lema de Campanya">
                    </div>
                </div>`);

                $("#headerModalEditaCandidat").html(`
                <p id="headerModalEditaCandidat" class="modal-card-title"><i class="fas fa-user-edit mr-2"></i> ${ dadesCandidat["nom"] }</p>`);

                $("#modalEditarCandidat").toggleClass("is-active");
            }
        });
    });

    $(".esborrarCandidat").click(function(e) {
        let idCandidat = $( e.target ).siblings("input").val();

        $("#headerModalEsborrarCandidat").html(`
        <p id="headerModalEsborrarCandidat" class="modal-card-title"><i class="fas fa-exclamation-circle mr-2"></i> Estàs Segur que vols Esborrar el Candidat ?</p>`);

        $("#cosFormEsborrarCandidat").children().remove();

        $("#cosFormEsborrarCandidat").append(`<input type="hidden" name="idCandidat" value="${ idCandidat }">`);

        $("#modalEsborrarCandidat").toggleClass("is-active");
    });
});