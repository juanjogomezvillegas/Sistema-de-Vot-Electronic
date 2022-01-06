$(document).ready(function() {

    $("#botoCrearUsuari, #btnCloseModal1, #btnCancelaModal1").click(function() {
        $("#modalCrearUsuari").toggleClass("is-active");
    });

    $("#btnCloseModal2, #btnCancelaModal2").click(function() {
        $("#modalEditaUsuari").toggleClass("is-active");
    });

    $("#btnCloseModal3, #btnCancelaModal3").click(function() {
        $("#modalBorrarUsuari").toggleClass("is-active");
    });

    $(".editaUsuari").click(function(e) {
        let nomUsuari = $( e.target ).siblings("input").val();

        $.ajax({
            url: "index.php?r=obtenirDadesUsuari", 
            type: "POST",
            data: { nomUsuari }, 
            success: function(data) {
                let dadesUsuari = $.parseJSON(data);

                $("#cosFormEditaUsuari").children().remove();

                $("#cosFormEditaUsuari").append(`<input type="hidden" name="idUsuari" value="${ dadesUsuari["id"] }">
                <div class="field">
                    <label class="label">Username</label>
                    <div class="control">
                        <input value="${ dadesUsuari["username"] }" id="username" name="username" class="input" type="text" placeholder="Username">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Role</label>
                    <div class="control">
                        <div class="select">
                            <select id="rol" name="rolUsuari">
                                <option value="${ dadesUsuari["rol"] }">${ dadesUsuari["rol"] }</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Manager">Manager</option>
                                <option value="Supervisor">Supervisor</option>
                            </select>
                        </div>
                    </div>
                </div>`);

                $("#headerModalEditaUsuari").html(`
                <p id="headerModalEditaUsuari" class="modal-card-title"><i class="fas fa-user-edit mr-2"></i> ${ dadesUsuari["username"] }</p>`);

                $("#modalEditaUsuari").toggleClass("is-active");       
            }
        });
    });

    $(".borrarUsuari").click(function(e) {
        let idUsuari = $( e.target ).siblings("input").val();

        $("#cosFormEsborrarUsuari").children().remove();

        $("#cosFormEsborrarUsuari").append(`<input type="hidden" name="idUsuari" value="${ idUsuari }">
        <p>Are you sure you want to Delete User?</p> `);

        $("#modalBorrarUsuari").toggleClass("is-active");
    });
});