<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$dbname = "kaba_contact";

$conn = new mysqli($servidor, $usuario, $clave, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibió el ID del contacto para cargar los datos
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM contacts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $contacto = $result->fetch_assoc();
    $stmt->close();
}

// Actualizar el contacto en la base de datos
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $sql = "UPDATE contacts SET name = ?, email = ?, message = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $email, $mensaje, $id);

    if ($stmt->execute()) {
        echo "Contacto actualizado con éxito.";
    } else {
        echo "Error al actualizar el contacto: " . $conn->error;
    }
    $stmt->close();

    header("Location: crud_clientes.php");
    exit;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="ruta-a-tu-estilo.css"> <!-- Asegúrate de colocar la ruta correcta del archivo CSS -->
</head>
<body>
    <div class="edit-contact-container">
        <h2 class="edit-contact-title">Editar Contacto</h2>
        <form method="POST" action="editar_contacto.php?id=<?= $contacto['id']; ?>">
            <input type="hidden" name="id" value="<?= $contacto['id']; ?>">

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?= $contacto['name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" value="<?= $contacto['email']; ?>" required>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea name="mensaje" required><?= $contacto['message']; ?></textarea>
            </div>

            <div class="button-group">
                <button type="submit" name="update" class="button-save">Actualizar</button>
                <button type="button" class="button-cancel" onclick="window.location.href='crud_clientes.php'">Cancelar</button>
            </div>
        </form>
    </div>
</body>
</html>


<style>
    /* Estilos para la página de edición de productos */
/* Estilos para el formulario de edición de contacto */
body {
    font-family: Arial, sans-serif;
    background-color: hsl(345, 100%, 70%);
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

.edit-contact-container {
    background-color: #ffffff;
    border-radius: 8px;
    padding: 30px;
    width: 100%;
    max-width: 500px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.edit-contact-title {
    font-size: 24px;
    font-weight: bold;
    color: #333333;
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-size: 16px;
    color: #555555;
    display: block;
    margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

.form-group textarea {
    resize: vertical;
    min-height: 100px;
}

.button-group {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    margin-top: 20px;
}

.button-save, .button-cancel {
    padding: 12px;
    width: 48%;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.button-save {
    background-color: #4CAF50;
    color: #ffffff;
}

.button-save:hover {
    background-color: #45a049;
}

.button-cancel {
    background-color: #d9534f;
    color: #ffffff;
}

.button-cancel:hover {
    background-color: #c9302c;
}


</style>
</html>
