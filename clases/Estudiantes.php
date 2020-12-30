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
        $resultado = $conn->query($sql);

        $conexionBD->Cerrar();

        return $resultado;
    }
}
