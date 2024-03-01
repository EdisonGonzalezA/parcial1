<?php
error_reporting(0);
/*TODO: Requerimientos */
require_once('../config/sesiones.php');
require_once("../models/actor.models.php");
$actor = new actor;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $actor->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $ID_actor = $_POST["ID_actor"];
        $datos = array();
        $datos = $actor->uno($ID_actor);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Edad = $_POST["Edad"];
        $Genero = $_POST["Genero"];
        $Nacionalidad = $_POST["Nacionalidad"];
        $ID_actor = $_POST["ID_actor"];
        $datos = array();
        $datos = $actor->Insertar($Nombre, $Edad, $Genero, $Nacionalidad, $ID_actor);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $ID_actor = $_POST["ID_actor"];
        $Nombre = $_POST["Nombre"];
        $Edad = $_POST["Edad"];
        $Genero = $_POST["Genero"];
        $Nacionalidad = $_POST["Nacionalidad"];
        $ID_pelicula = $_POST["ID_pelicula"];
        $datos = array();
        $datos = $actor->Actualizar($ID_actor, $Nombre, $Edad, $Genero, $Nacionalidad, $ID_pelicula);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $ID_actor = $_POST["ID_actor"];
        $datos = array();
        $datos = $actor->Eliminar($ID_actor);
        echo json_encode($datos);
        break;
}
