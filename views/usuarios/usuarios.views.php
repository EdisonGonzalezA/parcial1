<?php require_once('../html/head2.php')  ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Basic Bootstrap Table -->
<div class="card">
    <button type="button" class="btn btn-outline-secondary" onclick="roles()" data-bs-toggle="modal" data-bs-target="#ModalUsuarios">Nuevo Usuario</button>


    <h5 class="card-header">Lista de Usuarios</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaUsuarios">

            </tbody>
        </table>
    </div>
</div>


<!-- Modal Usuarios-->
<style>
    .swal2-container {
        z-index: 999999;
    }
</style>

<div class="modal" tabindex="-1" id="ModalUsuarios">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Insertar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_usuarios" method="post">
                <input type="hidden" name="idUsuarios" id="idUsuarios">
                <div class="modal-body">
                   <div class="form-group">
                        <label for="Nombres">Nombres</label>
                        <input type="text" name="Nombres" id="Nombres" class="form-control" placeholder="Ingrese sus nombres" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Apelldios</label>
                        <input type="text" name="Apellidos" id="Apellidos" class="form-control" placeholder="Ingrese sus apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Rol</label>
                        <select id="RolId" name="RolId" class="form-control" >
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Correo Electrónico</label>
                        <input onfocusout="unoconCorreo()" type="email" name="Correo" id="Correo" class="form-control" placeholder="Ingrese su Correo" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Contraseña</label>
                        <input type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="**********" required>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>






<?php require_once('../html/scripts2.php') ?>

<script src="./usuarios.js"></script>


