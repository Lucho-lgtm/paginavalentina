<?php
// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$clave = "";
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
header("Location: listar_contactos.php");
$conn->close();
?>

<?php
$conn = new mysqli($servidor, $usuario, $clave, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['update'])) {
    $id = $_POST['id']; // ID del contacto a actualizar
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $mensaje = $_POST['message'];

    // Actualización del registro
    $sql = "UPDATE contacts SET name = ?, email = ?, message = ? WHERE id = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $email, $mensaje, $id);

    if ($stmt->execute()) {
        echo "Contacto actualizado con éxito.";
    } else {
        echo "Error al actualizar el contacto: " . $conexion->error;
    }

    $stmt->close();
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
</head>
<body>
    <h2>Editar Contacto</h2>
    <form method="POST" action="editar_contacto.php?id=<?= $id; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $contacto['nombre']; ?>" required><br><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" value="<?= $contacto['email']; ?>" required><br><br>

        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" required><?= $contacto['mensaje']; ?></textarea><br><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
