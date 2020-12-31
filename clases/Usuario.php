<?php
include_once "ConexionBD.php";
class Usuario{
    private $codigo;
    private $password;

    public function __construct(int $codigo=0, string $password="algo")
    {
        $this->codigo = $codigo;
        $this->password = $password;
    }

    public function guardar(){
        $conexionBD = new ConexionBD();

        $conn = $conexionBD->Conectar();
        $sql = "INSERT INTO usuarios(codigo, password) VALUES($this->codigo, '$this->password')";
        $result = $conn->query($sql);

        $conexionBD->Cerrar();

        return $result;
    }

    public function eliminar(int $id){
        $conexionBD = new ConexionBD();
        $conn = $conexionBD->Conectar();

        $sql = "DELETE FROM usuarios WHERE id=$id";
        $resultado = $conn->query($sql);

        $conexionBD->Cerrar();

        return $resultado;
    }

    public function traerDatos(){
        $conexionBD = new ConexionBD();

        $conn = $conexionBD->Conectar();
        $temp = $conn->query("SELECT * FROM usuarios");
        $conexionBD->Cerrar();

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
        $conexionBD = new ConexionBD();

        $conn = $conexionBD->Conectar();
        $temp = $conn->query("SELECT password FROM usuarios WHERE id=$id");
        $conexionBD->Cerrar();

        $item = $temp->fetch_assoc();
        $passBD = $item["password"];

        if($passForm == $passBD){
            return true;
        }
        return false;
    }
}

