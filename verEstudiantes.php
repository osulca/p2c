<?php
echo "<h1>Lista de Estudiantes</h1>";
include_once "clases/Estudiantes.php";
$estudiante = new Estudiantes();
$resultados = $estudiante->traerTodo();
$i = 1;
echo "<table border='1'>
        <tr>
          <th>#</th>
          <th>Nombres</th>
          <th>Apellidos</th>
        </tr>";
foreach ($resultados as $item) {
    echo "<tr>
            <td>$i</td>
            <td>".$item["nombres"]."</td>
            <td>".$item["apellidos"]."</td>
          </tr>";
    $i++;
}
echo "</table>";
