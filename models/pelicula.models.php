<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');

class Pelicula
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM Pelicula;";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        //$con->close();
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($ID_pelicula)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT Pelicula.ID_pelicula, Pelicula.Titulo, Pelicula.Genero, Pelicula.Anio, Pelicula.Director, Actor.ID_actor, Actor.Nombre, Actor.Edad, Actor.Genero AS Actor_Genero, Actor.Nacionalidad FROM Pelicula INNER JOIN actua_en ON Pelicula.ID_pelicula = actua_en.ID_pelicula INNER JOIN actor ON actua_en.ID_actor = Actor.ID_actor WHERE Pelicula.ID_pelicula = $ID_pelicula";

        $datos = mysqli_query($con, $cadena);
        return $datos;
        //$con->close();
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($Titulo, $Genero, $Anio, $Director, $ID_actor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into pelicula(Titulo,Genero,Anio,Director) values ( '$Titulo', '$Genero', '$Anio', '$Director')";

        if (mysqli_query($con, $cadena)) {
            require_once('../models/actua_en.models.php');
            $Us = new actua_en();

            return $Us->Insertar(mysqli_insert_id($con), $ID_actor);
        } else {
            return 'Error al insertar en la base de datos';
        }
        //$con->close();
    }

    /*TODO: Procedimiento para actualizar */
    public function Actualizar($ID_pelicula, $Titulo, $Genero, $Anio, $Director, $ID_actor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Pelicula set Titulo='$Titulo',Genero='$Genero',Anio=$Anio,Director='$Director',Actor_ID_actor=$ID_actor where ID_pelicula= $ID_pelicula";
        if (mysqli_query($con, $cadena)) {
            return ($ID_pelicula);
        } else {
            return 'error al actualizar el registro';
        }
        //$con->close();
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($ID_pelicula)
    {
        $Us = new actua_en();
        $Us->Eliminar($ID_pelicula);
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Pelicula where ID_pelicula = $ID_pelicula";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
        //$con->close();
    }
}
