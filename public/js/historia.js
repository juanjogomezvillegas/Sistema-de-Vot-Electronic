$(document).ready(function() {
    $("#botoReiniciarDades, #btnCloseModal, #btnCancelaModal").click(function() {
        $("#modalReiniciarDades").toggleClass("is-active");
    });

    $("#botoCrearEvent, #btnCloseModal2, #btnCancelaModal2").click(function() {
        $("#modalCrearEvent").toggleClass("is-active");
    });

    $("#btnCloseModal3, #btnCancelaModal3").click(function() {
        $("#modalEsborrarEvent").toggleClass("is-active");
    });

    $("#btnCloseModal4, #btnCancelaModal4").click(function() {
        $("#modalEditarEvent").toggleClass("is-active");
    });

    $(".esborrarEvent").click(function(e) {
        let idEvent = $( e.target ).siblings("input").val();

        $("#cosFormEsborrarEvent").children().remove();

        $("#cosFormEsborrarEvent").append(`<input type="hidden" name="idEvent" value="${ idEvent }">
        <p>Are you sure you want to Delete the Event?</p>`);

        $("#modalEsborrarEvent").toggleClass("is-active");
    });

    $(".editarEvent").click(function(e) {
        let idEvent = $( e.target ).siblings("input").val();

        $.ajax({
            url: "index.php?r=obtenirDadesEvent", 
            type: "POST",
            data: { idEvent }, 
            success: function(data) {
                let dadesEvent = $.parseJSON(data);
        
                $("#cosFormEditarEvent").children().remove();
        
                $("#cosFormEditarEvent").append(`
                <input type="hidden" name="idEvent" value="${ dadesEvent["id"] }">
                <div class="field">
                    <label class="label">Event</label>
                    <div class="control">
                        <textarea class="textarea" name="nomEvent" placeholder="Event">${ dadesEvent["nom_event"] }</textarea>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Government</label>
                    <div class="control">
                        <input id="governEvent" name="governEvent" class="input" type="text" value="${ dadesEvent["govern"] }">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Color</label>
                    <div class="control">
                        <input id="colorEvent" name="colorEvent" class="input" type="color" value="${ dadesEvent["color"] }">
                    </div>
                </div>`);

                $("#titolEvent4").html(
                    `<p id="titolEvent4" class="modal-card-title"><i class="fas fa-exclamation-circle mr-2"></i>Edit Event of ${ dadesEvent["data_event"] }</p>`);
            }
        });

        $("#modalEditarEvent").toggleClass("is-active");
    });
});