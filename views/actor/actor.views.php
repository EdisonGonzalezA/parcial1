<?php require_once('../html/head2.php')  ?>

<!-- Basic Bootstrap Table -->
<div class="card">
    <button type="button" class="btn btn-outline-secondary" onclick="pelicula()" data-bs-toggle="modal" data-bs-target="#ModalActor">Nuevo Actor</button>


    <h5 class="card-header">Lista de Peliculas</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Genero</th>
                    <th>Año</th>
                    <th>Nacionalidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaActor">

            </tbody>
        </table>
    </div>
</div>


<!-- Modal Usuarios-->

<div class="modal" tabindex="-1" id="ModalActor">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <!-- From-->
            <form id="form_actor" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nombres">Nombre</label>
                        <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Ingrese el nombre del actor" require>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Edad</label>
                        <input type="text" name="Edad" id="Edad" class="form-control" placeholder="Ingrese la edad del actor" require>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Genero</label>
                        <input type="text" name="Genero" id="Genero" class="form-control" placeholder="Ingrese el genero del actor" require>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Nacionalidad</label>
                        <input type="text" name="Nacionalidad" id="Nacionalidad" class="form-control" placeholder="Ingrese la nacionalidad del actor" require>
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

<script src="./actor.js"></script>
