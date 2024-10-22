<?php
$servidor = "localhost"; // Cambia si tu servidor no es localhost
$usuario = "root"; // Tu usuario de base de datos
$clave = ""; // Tu contraseña de base de datos
$port = "3306";
$dbname = "kaba_contact";

/*$db = mysqli_connect($_ENV['DB_HOST'] ?? '',$_ENV['DB_USER'] ?? '', $_ENV['DB_PASS'] ?? '', $selectDB['namedb']);
mysqli_set_charset($db, "utf8");*/


// Crear conexión
$conn = new mysqli($servidor, $usuario, $clave, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $mensaje = $_POST['message'];

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $mensaje);

    if ($stmt->execute()) {
        echo "Mensaje enviado con éxito";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

header('Location: index.php');

?>
