<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$dbname = "kaba_contact";

$conn = new mysqli($servidor, $usuario, $clave, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Agregar un usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
}

// Eliminar un usuario
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $conn->query("DELETE FROM usuarios WHERE id=$id");
}

// Editar un usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    $id = $_POST["id"];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET username=?, password=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $password, $id);
    $stmt->execute();
}

// Obtener todos los usuarios
$result = $conn->query("SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        h2 {
            text-align: center;
            color: hsl(345, 100%, 70%);
        }
        .container {
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .btn-dashboard {
            display: inline-block;
            padding: 10px 15px;
            margin-bottom: 20px;
            background-color: hsl(345, 100%, 70%);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        .btn-dashboard:hover {
            background-color: hsl(345, 100%, 60%);
        }
        form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 10px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid hsl(345, 100%, 85%);
            border-radius: 4px;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid hsl(345, 100%, 85%);
            text-align: center;
        }
        th {
            background-color: hsl(345, 100%, 90%);
            color: hsl(345, 100%, 30%);
        }
        td {
            background-color: #fff;
        }
        tr:nth-child(even) td {
            background-color: hsl(345, 100%, 98%);
        }
        .btn {
            padding: 10px 15px;
            background-color: hsl(345, 100%, 70%);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: hsl(345, 100%, 60%);
        }
        .btn-delete {
            background-color: hsl(345, 80%, 60%);
        }
        .btn-delete:hover {
            background-color: hsl(345, 70%, 50%);
        }
        .action-form {
            display: inline-block;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Botón para regresar al dashboard -->
        <a href="dashboard.php" class="btn-dashboard">Volver al Dashboard</a>

        <h2>Gestión de Usuarios</h2>

        <!-- Formulario para agregar usuario -->
        <form method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" name="add" class="btn">Agregar Usuario</button>
        </form>

        <!-- Tabla de usuarios -->
        <table>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= htmlspecialchars($row["username"]) ?></td>
                    <td>
                        <!-- Botón para eliminar -->
                        <a href="?delete=<?= $row["id"] ?>" class="btn btn-delete">Eliminar</a>

                        <!-- Botón para editar (abre un formulario) -->
                        <form method="POST" class="action-form">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="text" name="username" value="<?= htmlspecialchars($row['username']) ?>" required>
                            <input type="password" name="password" placeholder="Nueva Contraseña">
                            <button type="submit" name="edit" class="btn">Editar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php $conn->close(); ?>

