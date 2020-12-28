<?php
$host = "localhost";
$usuario = "root";
$password = "";
$db = "universidad";

$conn = new mysqli($host,$usuario,$password,$db);
if($conn->connect_errno==0){
    echo "conexion exitosa";
}else{
    echo "conexion erronea ".$conn->connect_error;
}
echo "<p>";
$temp = $conn->query("SELECT * FROM usuarios");

/*echo "<table border='1'>
        <tr>
            <th>id</th>
            <th>codigo</th>
            <th>contraseña</th>
        </tr>";
foreach($temp->fetch_all() as $usuario) {
    echo "<tr>";
    echo "<td>".$usuario[0]."</td>";
    echo "<td>".$usuario[1]."</td>";
    echo "<td>".$usuario[2]."</td>";
    echo "</tr>";
}
echo "</table></p>";*/

echo "<table border='1'>
        <tr>
            <th>id</th>
            <th>codigo</th>
            <th>contraseña</th>
        </tr>";
    for($i = 1; $i <= $temp->num_rows; $i++) {
        $usuario2 = $temp->fetch_assoc();
        echo "<tr>";
        echo "<td>" . $usuario2["id"] . "</td>";
        echo "<td>" . $usuario2["codigo"] . "</td>";
        echo "<td>" . $usuario2["password"] . "</td>";
        echo "</tr>";
    }

echo "</table>";
