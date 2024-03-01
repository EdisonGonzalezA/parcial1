<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');

class Actor
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM Actor;";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($ID_actor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT Actor.ID_actor, Actor.Nombre, Actor.Edad, Actor.Genero, Actor.Nacionalidad, Pelicula.ID_pelicula, Pelicula.Titulo, Pelicula.Genero, Pelicula.Anio, Pelicula.Director from Actor INNER JOIN actua_en on Actor.ID_actor = actua_en.ID_actor INNER JOIN Pelicula ON actua_en.ID_pelicula = Pelicula.ID_pelicula WHERE Actor.ID_actor = $ID_actor";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($Nombre, $Edad, $Genero, $Nacionalidad, $ID_pelicula)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Actor(Nombres,Apellidos,Correo,Contrasenia, SucursalId, Cedula) values ( '$Nombre', '$Edad', '$Genero', '$Nacionalidad')";

        if (mysqli_query($con, $cadena)) {
            require_once('../models/actua_en.models.php');
            $Us = new actua_en();

            return $Us->Insertar(mysqli_insert_id($con), $ID_pelicula);
        } else {
            return 'Error al insertar en la base de datos';
        }
        $con->close();
    }

    /*TODO: Procedimiento para actualizar */
    public function Actualizar($ID_actor, $Nombre, $Edad, $Genero, $Nacionalidad, $ID_pelicula)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Actor set Nombre='Nacionalidad$Nombre',Edad='$Edad',Genero='$Genero',Nacionalidad='$Nacionalidad',ID_pelicula=$ID_pelicula where ID_actor= $ID_actor";
        if (mysqli_query($con, $cadena)) {
            return ($ID_actor);
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($ID_actor)
    {
        $Us = new actua_en();
        $Us->Eliminar($ID_actor);
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Actor where ID_actor = $ID_actor";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
        $con->close();
    }
}
