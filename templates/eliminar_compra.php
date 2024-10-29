<?php
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];

$conn = new mysqli("localhost", "username", "password", "database");
$stmt = $conn->prepare("DELETE FROM compras WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

echo json_encode(["success" => $stmt->affected_rows > 0]);
$stmt->close();
$conn->close();
?>
