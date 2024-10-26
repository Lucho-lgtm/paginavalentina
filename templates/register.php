<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$dbname = "kaba_contact";

$conn = new mysqli($servidor, $usuario, $clave, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar si el usuario ya existe
    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username); // Solo un "s" para una variable
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "El usuario ya está registrado.";
    } else {
        // Hash de la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insertar nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hashedPassword); // Dos "s" para dos variables

        if ($stmt->execute()) {
            $success = "Registro exitoso. Ahora puedes iniciar sesión.";
        } else {
            $error = "Error al registrar el usuario. Intenta de nuevo.";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .register-container {
            width: 350px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h2 {
            text-align: center;
            color: hsl(345, 100%, 70%);
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: hsl(345, 100%, 70%);
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: hsl(345, 80%, 60%);
        }
        .error, .success {
            text-align: center;
            padding: 10px;
            margin-top: 10px;
            color: white;
        }
        .error {
            background-color: #d9534f;
        }
        .success {
            background-color: #5cb85c;
        }
        .login-link {
            text-align: center;
            display: block;
            margin-top: 20px;
            color: hsl(345, 100%, 70%);
            text-decoration: none;
        }
        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Registro</h2>
    <form method="POST" action="">
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit" class="btn">Registrar</button>

        <?php if (!empty($error)): ?>
            <p class="error"><?= $error; ?></p>
        <?php elseif (!empty($success)): ?>
            <p class="success"><?= $success; ?></p>
        <?php endif; ?>
    </form>

    <!-- Enlace para redirigir al usuario a la página de inicio de sesión -->
    <a href="login.php" class="login-link">¿Ya tienes cuenta? Inicia sesión aquí</a>
</div>

</body>
</html>
