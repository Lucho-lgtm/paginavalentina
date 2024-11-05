<?php
// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$clave = "";
$dbname = "kaba_contact";
$conn = new mysqli($servidor, $usuario, $clave, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar acciones CRUD
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['accion'])) {
        switch ($_POST['accion']) {
            case "agregar":
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $sql = "INSERT INTO carrito (nombre, precio) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sd", $nombre, $precio);
                $stmt->execute();
                break;
                
            case "editar":
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $sql = "UPDATE carrito SET nombre = ?, precio = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sdi", $nombre, $precio, $id);
                $stmt->execute();
                break;
                
            case "eliminar":
                $id = $_POST['id'];
                $sql = "DELETE FROM carrito WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                break;
        }
    }
}

// Consultar los productos en el carrito
$sql = "SELECT * FROM carrito";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras - CRUD</title>
    <style>
        /* Estilos para el carrito */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .container { max-width: 800px; margin: 40px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        h1 { color: hsl(345, 100%, 70%); text-align: center; }
        .back-button { display: inline-block; margin-bottom: 20px; padding: 10px 20px; background-color: #555; color: #fff; text-decoration: none; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: hsl(345, 100%, 70%); color: white; }
        .btn { padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer; }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-delete { background-color: #dc3545; color: white; }
        .btn-add { background-color: hsl(345, 100%, 70%); color: white; display: block; width: 100%; padding: 10px; text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Carrito de Compras</h1>

    <!-- Botón para regresar a compras.php -->
    <a href="compras.php" class="back-button">Volver a Compras</a>

    <!-- Formulario para agregar producto -->
    <form method="POST">
        <input type="hidden" name="accion" value="agregar">
        <input type="text" name="nombre" placeholder="Nombre del producto" required>
        <input type="number" step="0.01" name="precio" placeholder="Precio" required>
        <button type="submit" class="btn btn-add">Agregar Producto</button>
    </form>

    <!-- Tabla de productos en el carrito -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo htmlspecialchars($row["nombre"]); ?></td>
                        <td>$<?php echo number_format($row["precio"], 2); ?></td>
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="accion" value="editar">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <input type="text" name="nombre" value="<?php echo htmlspecialchars($row["nombre"]); ?>" required>
                                <input type="number" step="0.01" name="precio" value="<?php echo $row["precio"]; ?>" required>
                                <button type="submit" class="btn btn-edit">Editar</button>
                            </form>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <button type="submit" class="btn btn-delete" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4">No hay productos en el carrito.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
$conn->close();
?>
