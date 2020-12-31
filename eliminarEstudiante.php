<?php
if(!empty($_POST)){
    $id = $_POST["id"];
    include_once "clases/Estudiantes.php";
    include_once "clases/Usuario.php";

    $estudiante = new Estudiantes();
    $usuario = new Usuario();

    $filasAfectadas = $estudiante->eliminar($id);

    if($filasAfectadas!=0){
        $filasAfectadas2 = $usuario->eliminar($id);
        if($filasAfectadas2!=0) {
            header("Location: verEstudiantes.php");
        }
        else{
            echo "error Usuario";
        }
    }else{
        echo "error Estudiante";
    }
}
