<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');

class Usuarios
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT Usuarios.idUsuarios, Usuarios.Nombres, Usuarios.Contrasenia, Usuarios.Apellidos, Usuarios.Correo, Roles.Rol, Roles.idRoles from Usuarios INNER JOIN Usuarios_Roles on Usuarios.idUsuarios = Usuarios_Roles.Usuarios_idUsuarios INNER JOIN Roles ON Usuarios_Roles.Roles_idRoles = Roles.idRoles";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idUsuarios)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT Usuarios.idUsuarios, Usuarios.Nombres, Usuarios.Contrasenia, Usuarios.Apellidos, Usuarios.Correo, Roles.Rol, Roles.idRoles from Usuarios INNER JOIN Usuarios_Roles on Usuarios.idUsuarios = Usuarios_Roles.Usuarios_idUsuarios INNER JOIN Roles ON Usuarios_Roles.Roles_idRoles = Roles.idRoles WHERE Usuarios.idUsuarios = $idUsuarios";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($Nombres, $Apellidos, $Correo, $Contrasenia, $idRoles)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Usuarios(Nombres,Apellidos,Correo,Contrasenia) values ( '$Nombres', '$Apellidos', '$Correo', '$Contrasenia')";

        if (mysqli_query($con, $cadena)) {
            require_once('../models/Usuarios_Roles.models.php');
            $UsRoles = new Usuarios_Roles();

            return $UsRoles->Insertar(mysqli_insert_id($con), $idRoles);
        } else {
            return 'Error al insertar en la base de datos';
        }
        $con->close();
    }

    public function unoconCorreo($Correo)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT count(*) as numero FROM `Usuarios` WHERE `Correo`='$Correo'";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }

    /*TODO: Procedimiento para actualizar */
    public function Actualizar($idUsuarios, $Nombres, $Apellidos, $Correo, $Contrasenia, $idRoles)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Usuarios set Nombres='$Nombres',Apellidos='$Apellidos',Correo='$Correo',Contrasenia='$Contrasenia',Roles_idRoles=$idRoles where idUsuarios= $idUsuarios";
        if (mysqli_query($con, $cadena)) {
            return ($idUsuarios);
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($idUsuarios)
    {
        require_once('Usuarios_Roles.models.php');
        $UsRoles = new Usuarios_Roles();
        $usro = $UsRoles->Eliminar($idUsuarios);
        if ($usro == 'ok') {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from Usuarios where idUsuarios = $idUsuarios";

            return "ok";
        } else {
            return false;
        }
        $con->close();
    }

    public function login($Correo)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT Usuarios.idUsuarios, Usuarios.Nombres, Usuarios.Contrasenia, Usuarios.Apellidos, Usuarios.Correo, Roles.Rol, Roles.idRoles from Usuarios INNER JOIN Usuarios_Roles on Usuarios.idUsuarios = Usuarios_Roles.Usuarios_idUsuarios INNER JOIN Roles ON Usuarios_Roles.Roles_idRoles = Roles.idRoles WHERE `Correo`='$Correo'";
            $datos = mysqli_query($con, $cadena);
            return $datos;
        } catch (Throwable $th) {
            return $th->getMessage();
        }
        $con->close();
    }
}
