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
    
    public function uno($ID_actor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM actor WHERE actor.ID_actor = $ID_actor;";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function Insertar($Nombre, $Edad, $Genero, $Nacionalidad)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `actor`(`Nombre`, `Edad`, `Genero`, `Nacionalidad`) VALUES('$Nombre','$Edad','$Genero','$Nacionalidad')";

        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return mysqli_error($con);
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

    public function Eliminar($ID_actor){   
        require_once('../models/actua_en.models.php');
        $Us = new actua_en();
        $Usp = $Us->Eliminar($ID_actor);
        if ($Usp == 'ok') {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from actor where ID_actor = $ID_actor";
            return "ok";
        }else{
            return $false;
        }
        $con->close();
    }
}
