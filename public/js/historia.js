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

    $(".esborrarEvent").click(function(e) {
        let idEvent = $( e.target ).siblings("input").val();

        $("#cosFormEsborrarEvent").children().remove();

        $("#cosFormEsborrarEvent").append(`<input type="hidden" name="idEvent" value="${ idEvent }">
        <p>Are you sure you want to Delete the Event?</p>`);

        $("#modalEsborrarEvent").toggleClass("is-active");
    });
});