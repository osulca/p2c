<?php
class Usuario{
    private $user;
    private $pass;

    public function traerDatos(){
        $host = "localhost";
        $usuario = "root";
        $password = "";
        $db = "universidad";

        $conn = new mysqli($host,$usuario,$password,$db);
        $temp = $conn->query("SELECT * FROM usuarios");

        // $array = ["omar_sulca", "123456"];
        // return $array;
        return $temp->fetch_all();
    }

    public function buscarUsuario(array $datos, int $usuario): int{
        $resultado = 0;
        foreach($datos as $item) {
            if($usuario == (int)$item[1]){
                $resultado = $item[0];
                break;
            }
        }
        return $resultado;
    }

    public function validarContraseña(int $id, string $passForm): bool{
        $host = "localhost";
        $usuario = "root";
        $password = "";
        $db = "universidad";

        $conn = new mysqli($host,$usuario,$password,$db);
        $temp = $conn->query("SELECT password FROM usuarios WHERE id=$id");

        $item = $temp->fetch_assoc();
        $passBD = $item["password"];

        if($passForm == $passBD){
            return true;
        }
        return false;
    }
}