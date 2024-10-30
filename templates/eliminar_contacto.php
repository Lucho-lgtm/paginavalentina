<?php
// Conexión a la base de datos
$servidor = "localhost"; // Cambia si tu servidor no es localhost
$usuario = "root"; // Tu usuario de base de datos
$clave = ""; // Tu contraseña de base de datos
$port = "3306";
$dbname = "kaba_contact";

$conn = new mysqli($servidor, $usuario, $clave, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibió el ID del contacto
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el contacto de la base de datos
    $sql = "DELETE FROM contacts WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Contacto eliminado exitosamente.";
    } else {
        echo "Error al eliminar el contacto: " . $conn->error;
    }
}

// Redirigir de vuelta a la lista de contactos
header("Location: crud_clientes.php");
$conn->close();
?>
