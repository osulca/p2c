<?php
$id = $_POST["id"];
include_once "clases/Estudiantes.php";
$estudiante = new Estudiantes();
$resultado = $estudiante->traerPorId($id);
foreach ($resultado as $item){
    $nombres = $item["nombres"];
    $apellidos = $item["apellidos"];
    $idUsuario = $item["id_usuario"];
}
?>
<form method="post" action="actualizarEstudiante.php">
    <input type="text" name="nombres" placeholder="Nombres" value="<?=$nombres?>"><br>
    <input type="text" name="apellidos" placeholder="Apellidos" value="<?=$apellidos?>"><br>
    <input type="number" name="idUsuario" placeholder="Id Usuario" value=<?=$idUsuario?> disabled><br>
    <input type="hidden" name="id" value=<?=$id?>><br>
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
