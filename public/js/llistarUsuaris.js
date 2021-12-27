$(document).ready(function() {

    $("#botoCrearUsuari, #btnCloseModal, #btnCancelaModal").click(function() {
        $("#modalCrearUsuari").toggleClass("is-active");
    });

    $(".editaUsuari").click(function(e) {
        let nomUsuari = $( e.target ).siblings("input").val();

        $.ajax({
            url: "index.php?r=actualitzarUsuari", 
            type: "POST",
            data: { nomUsuari }, 
            success: function(data) {
                let dadesUsuari = $.parseJSON(data);

                console.table(dadesUsuari);

                $("#cosFormEditaUsuari").children().remove();

                $("#cosFormEditaUsuari").append(`<div class="field">
                <label class="label">Nom d'Usuari</label>
                <div class="control">
                    <input value="${ dadesUsuari["username"] }" id="username" name="username" class="input" type="text" placeholder="Nom d'Usuari">
                </div>
            </div>
            <div class="field">
                <label class="label">Rol de l'Usuari</label>
                <div class="control">
                    <div class="select">
                        <select id="rol" name="rolUsuari">
                            <option value="${ dadesUsuari["rol"] }">${ dadesUsuari["rol"] }</option>
                        </select>
                    </div>
                </div>
            </div>`);

                $("#modalEditaUsuari").toggleClass("is-active");       
            }
        });
    });
});