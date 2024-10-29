<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$dbname = "kaba_contact";

$conn = new mysqli($servidor, $usuario, $clave, $dbname);

$result = $conn->query("SELECT * FROM compras");
$compras = [];

while ($row = $result->fetch_assoc()) {
    $compras[] = $row;
}

echo json_encode($compras);
$conn->close();
?>
