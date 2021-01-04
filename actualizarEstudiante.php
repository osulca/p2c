<?php
$id = $_POST["id"];
include_once "clases/Estudiantes.php";
$estudiante = new Estudiantes();
$resultado = $estudiante->traerPorId($id);

?>
<form method="post" action="actualizarEstudiante.php">
    <input type="text" name="nombres" placeholder="Nombres" value="<?=$resultado[1]?>"><br>
    <input type="text" name="apellidos" placeholder="Apellidos" value="<?=$resultado[2]?>"><br>
    <input type="number" name="idUsuario" placeholder="Id Usuario" value=<?=$resultado[3]?> disabled><br>
    <input type="hidden" name="id" value=<?=$resultado[0]?>><br>
    <input type="submit" name="submit" value="Actualizar">
</form>
<?php

if(isset($_POST["submit"])){
    $nombreGuardar = $_POST["nombres"];
    $apellidosGuardar = $_POST["apellidos"];
    $idGuardar = $_POST["id"];
    $filasAfectadas = $estudiante->actualizar($nombreGuardar, $apellidosGuardar, $idGuardar);
    if($filasAfectadas != 0){
        header("Location: verEstudiantes.php");
    }else{
        echo "Error Actualizar";
    }
}
