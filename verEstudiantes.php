<?php
echo "<h1>Lista de Estudiantes</h1>";
include_once "clases/Estudiantes.php";
$estudiante = new Estudiantes();
$resultados = $estudiante->traerTodo();

echo "<table border='1'>
        <tr>
          <th>#</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>ID usuario</th>
        </tr>";
echo "<tr>
        <td colspan='4'>Forma Normal (fetch_assoc)</td>
      </tr>";
for($i=1; $i<=$resultados->num_rows; $i++){
    $item = $resultados->fetch_assoc();
    echo "<tr>
            <td>".$item["id"]."</td>
            <td>".$item["nombres"]."</td>
            <td>".$item["apellidos"]."</td>
            <td>".$item["id_usuario"]."</td>
          </tr>";
}
echo "<tr>
        <td colspan='4'>Forma Simplificada (sin fetch)</td>
      </tr>";
foreach ($resultados as $item) {
    echo "<tr>
            <td>".$item["id"]."</td>
            <td>".$item["nombres"]."</td>
            <td>".$item["apellidos"]."</td>
            <td>".$item["id_usuario"]."</td>
          </tr>";
    $i++;
}

echo "</table>";
