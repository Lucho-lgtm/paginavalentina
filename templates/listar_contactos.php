<?php
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

// Obtener los datos de la tabla 'contactos'
$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contactos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        h2 {
            text-align: center;
            color: hsl(345, 100%, 70%);
            margin-top: 20px;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            text-align: left;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: hsl(345, 100%, 70%);
            color: white;
        }
        td {
            color: #333;
        }
        .btn {
            padding: 8px 16px;
            background-color: hsl(345, 100%, 70%);
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn:hover {
            background-color: hsl(345, 100%, 60%);
        }
        .btn-delete {
            background-color: #d9534f;
        }
        .btn-delete:hover {
            background-color: #c9302c;
        }
        .btn-add {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: hsl(345, 100%, 70%);
            color: white;
            text-decoration: none;
            text-align: center;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-add:hover {
            background-color: hsl(345, 100%, 60%);
        }
        .btn-delete {
            background-color: hsl(0, 80%, 55%);
        }
        .btn-delete:hover {
            background-color: hsl(0, 70%, 50%);
        }
    </style>
</head>
<body>
    <h2>Lista de Contactos</h2>

    <!-- Botón para redirigir a contact_us.html -->
    <a href="contact_us.php" class="btn-add">Añadir nuevo contacto</a>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>ID</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['message']; ?></td>
                        <td><?= $row['id']; ?></td>
                        <td>
                            <a href="editar_contacto.php?id=<?= $row['id']; ?>" class="btn">Editar</a>
                            <a href="eliminar_contacto.php?id=<?= $row['id']; ?>" class="btn btn-delete" onclick="return confirm('¿Estás seguro de que deseas eliminar este contacto?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center;">No hay contactos registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>

