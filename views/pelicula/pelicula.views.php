<?php require_once('../html/head2.php')  ?>

<!-- Basic Bootstrap Table -->
<div class="card">
    <button type="button" class="btn btn-outline-secondary" onclick="pelicula()" data-bs-toggle="modal" data-bs-target="#ModalPelicula">Nueva Pelicula</button>


    <h5 class="card-header">Lista de Peliculas</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Genero</th>
                    <th>Año</th>
                    <th>Director</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaPelicula">

            </tbody>
        </table>
    </div>
</div>


<!-- Modal Usuarios-->

<div class="modal" tabindex="-1" id="ModalPelicula">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <!-- From-->
            <form id="form_pelicula" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nombres">Titulo</label>
                        <input type="text" name="Titulo" id="Titulo" class="form-control" placeholder="Ingrese el titulo de la pelicula" require>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Genero</label>
                        <input type="text" name="Genero" id="Genero" class="form-control" placeholder="Ingrese el genero de la pelicula" require>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Año</label>
                        <input type="text" name="Anio" id="Anio" class="form-control" placeholder="Ingrese el año de la pelicula" require>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Director</label>
                        <input type="text" name="Director" id="Director" class="form-control" placeholder="Ingrese el nombre del Director" require>
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

<script src="./pelicula.js"></script>
