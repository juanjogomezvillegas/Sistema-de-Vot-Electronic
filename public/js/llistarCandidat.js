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

    $(".editaImatgeCandidat").click(function(e) {
        let idCandidat = $( e.target ).siblings("input").val();

        $("#app").remove();

        $("#formCanviImatge").children().remove();

        $("#formCanviImatge").append(`<form action="index.php?r=canviarImatgeCandidat" method="POST" enctype="multipart/form-data" class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-1 mb-4">
        <button class="button is-link">Canviar Imatge <i class="fas fa-camera ml-2"></i></button>
        <input type="hidden" name="idCandidat" value="${ idCandidat }">
        <div id="file-js-example" class="file has-name mt-3 is-link">
            <label class="file-label">
                <input class="file-input" type="file" name="imatgeCandidat">
                <span class="file-cta">
                <span class="file-icon">
                    <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                    Puja una Imatge ...
                </span>
                </span>
                <span class="file-name has-background-link-light">
                    No has pujat cap imatge
                </span>
            </label>
        </div>
    </form>
    <script src="js/showFitxerPujat.js"></script>`);
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
                    <label class="label">Ideologia</label>
                    <div class="control">
                        <input id="ideologia" name="ideologia" value="${ dadesCandidat["ideologia"] }" class="input" type="text" placeholder="Ideologia">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Lema de Campanya</label>
                    <div class="control">
                        <input id="lemaCampanya" name="lemaCampanya" value="${ dadesCandidat["lema_campanya"] }" class="input" type="text" placeholder="Lema de Campanya">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Color</label>
                    <div class="control">
                        <input id="colorCandidat" name="colorCandidat" value="${ dadesCandidat["color"] }" class="input" type="color">
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

    $(".sumaVots").click(function(e) {
        let idCandidat = $( e.target ).siblings("input").val();

        $.ajax({
            url: "index.php?r=sumaVots", 
            type: "POST",
            data: { idCandidat }
        });
    });

    $(".restaVots").click(function(e) {
        let idCandidat = $( e.target ).siblings("input").val();

        $.ajax({
            url: "index.php?r=restaVots", 
            type: "POST",
            data: { idCandidat }
        });
    });
});