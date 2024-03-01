<?php
error_reporting(0);
/*TODO: Requerimientos */
require_once('../config/sesiones.php');
require_once("../models/pelicula.models.php");

$pelicula = new pelicula;

switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $pelicula->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $ID_pelicula = $_POST["ID_pelicula"];
        $datos = array();
        $datos = $pelicula->uno($ID_pelicula);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $Titulo = $_POST["Titulo"];
        $Genero = $_POST["Genero"];
        $Anio = $_POST["Anio"];
        $Director = $_POST["Director"];
        $ID_pelicula = $_POST["ID_pelicula"];
        $datos = array();
        $datos = $pelicula->Insertar($Titulo, $Genero, $Anio, $Director, $ID_pelicula);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $ID_pelicula = $_POST["ID_pelicula"];
        $Titulo = $_POST["Titulo"];
        $Genero = $_POST["Genero"];
        $Anio = $_POST["Anio"];
        $Director = $_POST["Director"];
        $ID_actor = $_POST["ID_actor"];
        $datos = array();
        $datos = $pelicula->Actualizar($ID_pelicula, $Titulo, $Genero, $Anio, $Director, $ID_actor);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $ID_pelicula = $_POST["ID_pelicula"];
        $datos = array();
        $datos = $pelicula->Eliminar($ID_pelicula);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para insertar */
    
}
