<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$dbname = "kaba_contact";

$conn = new mysqli($servidor, $usuario, $clave, $dbname);

$data = json_decode(file_get_contents("php://input"), true);
$carrito = $data['carrito'];

foreach ($carrito as $producto_id) {
    $stmt = $conn->prepare("INSERT INTO compras (producto_id) VALUES (?)");
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
}

echo json_encode(["success" => true]);
$conn->close();
?>
