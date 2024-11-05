<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$dbname = "kaba_contact";

$conn = new mysqli($servidor, $usuario, $clave, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Eliminar un producto del carrito
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $conn->query("DELETE FROM carrito WHERE id = $id");
    header("Location: carrito.php");
    exit();
}

// Editar un producto en el carrito
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];

    $sql = "UPDATE carrito SET nombre = ?, precio = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdi", $nombre, $precio, $id);
    $stmt->execute();

    header("Location: carrito.php");
    exit();
}

// Obtener todos los productos en el carrito
$result = $conn->query("SELECT * FROM carrito");

$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .compras-container {
            padding: 20px;
            max-width: 800px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .compras-title {
            font-size: 26px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .total-container {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }

        .total-amount {
            color: #28a745;
        }

        .button-confirm {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-confirm:hover {
            background-color: #0056b3;
        }

        .button-edit, .button-delete {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .button-edit {
            background-color: #ffc107;
            color: #000;
        }

        .button-edit:hover {
            background-color: #e0a800;
        }

        .button-delete {
            background-color: #dc3545;
            color: #fff;
        }

        .button-delete:hover {
            background-color: #c82333;
        }
        .back-button { 
            display: inline-block; 
            margin-bottom: 20px; 
            padding: 10px 20px; 
            background-color: #555; 
            color: #fff; 
            text-decoration: none; 
            border-radius: 5px; 
        }
    </style>
</head>
<body>
    <a href="dashboard.php" class="back-button">Volver al dashboard</a>
    <div class="compras-container">
        <h1 class="compras-title">Carrito de Compras</h1>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row["nombre"]) ?></td>
                        <td>$<?= number_format($row["precio"], 2) ?></td>
                        <td>
                            <!-- Formulario para editar producto -->
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                <input type="text" name="nombre" value="<?= htmlspecialchars($row["nombre"]) ?>" required>
                                <input type="number" name="precio" value="<?= $row["precio"] ?>" step="0.01" required>
                                <button type="submit" name="edit" class="button-edit">Editar</button>
                            </form>
                            <!-- Botón para eliminar producto -->
                            <a href="carrito.php?delete=<?= $row["id"] ?>" class="button-delete">Eliminar</a>
                        </td>
                    </tr>
                    <?php $total += $row["precio"]; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="total-container">
            Total: <span class="total-amount">$<?= number_format($total, 2) ?></span>
        </div>
        <button class="button-confirm" onclick="confirmarCompra()">Confirmar Compra</button>
    </div>

    <script>
        function confirmarCompra() {
            alert("Compra confirmada.");
            // Puedes redireccionar o realizar más acciones aquí después de confirmar la compra
        }
    </script>
</body>
</html>

<?php $conn->close(); ?>
