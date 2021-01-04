<?php
include_once "ConexionBD.php";
class Estudiantes{
    private $nombres;
    private $apellidos;
    private $idUsuario;

    public function traerTodo(){
        $conexionBD = new ConexionBD();
        $conn = $conexionBD->Conectar();

        $sql = "SELECT * FROM estudiantes";
        $sentencia = $conn->prepare($sql);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $conexionBD->Cerrar();

        return $resultado;
    }

    public function traerPorId(int $id){
        $conexionBD = new ConexionBD();
        $conn = $conexionBD->Conectar();

        $sql = "SELECT * FROM estudiantes WHERE id=$id";
        $sentencia = $conn->prepare($sql);
        $sentencia->execute();
        $sentencia->bind_result($ide, $nombres, $apellidos, $idu);
        while($sentencia->fetch()){
            $resultado[0] = $ide;
            $resultado[1] = $nombres;
            $resultado[2] = $apellidos;
            $resultado[3] = $idu;
        }

        $conexionBD->Cerrar();

        return $resultado;
    }

    public function actualizar(String $nombres, String $apellidos, int $id){
        $conexionBD = new ConexionBD();
        $conn = $conexionBD->Conectar();

        $sql = "UPDATE estudiantes SET nombres='$nombres', apellidos='$apellidos' WHERE id=$id";
        $resultado = $conn->query($sql);

        $conexionBD->Cerrar();

        return $resultado;
    }

    public function eliminar(int $idUsuario){
        $conexionBD = new ConexionBD();
        $conn = $conexionBD->Conectar();

        $sql = "DELETE FROM estudiantes WHERE id_usuario=$idUsuario";
        $resultado = $conn->query($sql);

        $conexionBD->Cerrar();

        return $resultado;
    }
}
