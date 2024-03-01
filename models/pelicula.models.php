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
        $con->close();
        return $datos;
    }

    public function uno($ID_pelicula)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM pelicula WHERE pelicula.ID_pelicula = $ID_pelicula;";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    
    public function Insertar($Titulo, $Genero, $Anio, $Director)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `pelicula`(`Titulo`, `Genero`, `Anio`, `Director`) VALUES('$Titulo','$Genero','$Anio','$Director')";

        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return mysqli_error($con);
        }
        $con->close();
    }

    /*TODO: Procedimiento para actualizar */
    public function Actualizar($ID_pelicula, $Titulo, $Genero, $Anio, $Director, $ID_actor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update pelicula set Titulo='$Titulo',Genero='$Genero',Anio=$Anio,Director='$Director', ID_actor=$ID_actor where ID_pelicula= $ID_pelicula";
        if (mysqli_query($con, $cadena)) {
            return ($ID_pelicula);
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($ID_pelicula){   
        require_once('../models/actua_en.models.php');
        $Us = new actua_en();
        $Usp = $Us->Eliminar($ID_pelicula);
        if ($Usp == 'ok') {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from pelicula where ID_pelicula = $ID_pelicula";
            return "ok";
        }else{
            return $false;
        }
        $con->close();
    }
}

