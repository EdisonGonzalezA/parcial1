<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class actua_en
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from actua_en";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($ID_pelicula, $ID_actor,)
    {   $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into actua_en(ID_pelicula,ID_actor) values ( $ID_pelicula,  $ID_actor )";

        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
        $con->close();
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($ID_pelicula, $ID_actor,)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update actua_en set ID_pelicula=$ID_pelicula,ID_actor=$ID_actor";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($ID_pelicula)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `actua_en` WHERE `ID_pelicula`= $ID_pelicula";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return false;
        }
        $con->close();
    }
}
