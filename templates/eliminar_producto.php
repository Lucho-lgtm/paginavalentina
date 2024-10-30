<?php
// eliminar_producto.php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$dbname = "kaba_contact";

$conn = new mysqli($servidor, $usuario, $clave, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del producto a eliminar
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;

if ($id) {
    $sql = "DELETE FROM compras WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    $success = $stmt->execute();
    echo json_encode(['success' => $success]);

    $stmt->close();
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>


