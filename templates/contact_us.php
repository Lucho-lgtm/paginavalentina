<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $dbname = "kaba_contact";
    $conn = new mysqli($servidor, $usuario, $clave, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Inserta el mensaje en la base de datos
    $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        $_SESSION['mensaje_enviado'] = true; // Almacena en la sesión si el mensaje se envió correctamente
    }

    $stmt->close();
    $conn->close();

    header("Location: contact_us.php"); // Recargar la página para limpiar el formulario
    exit();
}

// Verifica si el formulario fue enviado
$mensaje_enviado = false;
if (isset($_SESSION['mensaje_enviado'])) {
    $mensaje_enviado = true;
    unset($_SESSION['mensaje_enviado']); // Borra la variable de sesión después de mostrar el popup
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos</title>
    <link rel="stylesheet" href="/pagina.valentina/css/estilos.css">
</head>
<body>

<?php if ($mensaje_enviado): ?>
    <div class="popup" id="popup">
        <div class="popup-content">
            <h2>¡Mensaje enviado!</h2>
            <p>Gracias por contactarnos.</p>
            <button onclick="closePopup()">Cerrar</button>
        </div>
    </div>
<?php endif; ?>

<header>
    <div class="container-hero">
        <div class="container hero">
            <div class="customer-support">
                <i class="fa-solid fa-headset"></i>
                <div class="content-customer-support">
                    <span class="text">Atención al cliente</span>
                    <span class="number">(+57)3043809326</span>
                </div>
            </div>
            <div class="container-logo">
                <h1 class="logo"><a href="/">KABA</a></h1>
            </div>
        </div>
    </div>
    <div class="container-navbar">
        <nav class="navbar container">
            <i class="fa-solid fa-bars"></i>
            <ul class="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="#container-options">Línea capilar</a></li>
                <li><a href="#container_specials">Línea corporal</a></li>
                <li><a href="#container_facial">Línea facial</a></li>
                <li><a href="#">Nosotros</a></li>
                <li><a href="contact_us.php">Contáctanos</a></li>
            </ul>
            <form class="search-form">
                <input type="search" placeholder="Buscar..." />
                <button class="btn-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </nav>          
    </div>
</header>

<div class="separator"></div>
<main class="titleBanner">
    <h2 class="title1">Contáctanos</h2>
    <p class="banner_contact">Estamos aquí para ayudarte. Completa el formulario y nos pondremos en contacto contigo.</p>
</main>

<section class="content">
    <div class="container">
        <h3 class="labelContact">Formulario de Contacto</h3>
        <form action="contact_us.php" method="POST">         
            <label class="labelName" for="name">Nombre:</label>
            <input type="text" id="name" name="name" placeholder="Ingresa tu nombre" required>
            
            <label class="labelName" for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>

            <label class="labelName" for="message">Mensaje:</label>
            <textarea id="areaText" name="message" rows="5" placeholder="Escribe tu mensaje aquí" required></textarea>

            <button class="btn_contact" type="submit" name="registro">Enviar</button>
        </form>
    </div>
</section>

<div class="separator"></div>

<footer class="footer">
    <div class="container container-footer">
        <div class="menu-footer">
            <div class="contact-info">
                <p class="title-footer">Información de Contacto</p>
                <ul>
                    <li>Dirección: Carrera 17 Barrio Centenario</li>
                    <li>Teléfono: (+57) 3043809326</li>
                    <li>Email: kabanaturals@gmail.com</li>
                </ul>
                <div class="social-icons">
                    <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://whatsapp.com/dl/"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="https://youtube.com"><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://www.threads.net"><i class="fa-brands fa-threads"></i></a>
                    <a href="https://www.tiktok.com"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
            <div class="information">
                <p class="title-footer">Información</p>
                <ul>
                    <li><a href="#">Acerca de Nosotros</a></li>
                    <li><a href="#">Información de Envíos</a></li>
                    <li><a href="#">Políticas de Privacidad</a></li>
                    <li><a href="#">Términos y Condiciones</a></li>
                    <li><a href="#">Contáctanos</a></li>
                </ul>
            </div>
            <div class="my-account">
                <p class="title-footer">Sobre nosotros</p>
                <ul>
                    <li><a href="#">Quienes Somos</a></li>
                    <li><a href="#">Nuestras Tiendas</a></li>
                    <li><a href="#">Lista de Deseos</a></li>
                    <li><a href="#">Reembolsos</a></li>
                </ul>
            </div>
            <div class="newsletter">
                <p class="title-footer">Suscríbete</p>
                <div class="content">
                    <p>Suscríbete a nuestros boletines y mantente al día con nuevas colecciones y ofertas exclusivas.</p>
                    <input type="email" placeholder="Ingresa el correo aquí...">
                    <button>Suscríbete</button>
                </div>
            </div>
        </div>
        <div class="pagos">
            <img class="mediodepago" src="/pagina.valentina/images/mediosdepago.jpg" alt="">
        </div>
    </div>
</footer>

<script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
<script>
    // Mostrar el popup si el mensaje fue enviado
    document.addEventListener("DOMContentLoaded", function() {
        <?php if ($mensaje_enviado): ?>
            document.getElementById("popup").style.display = "flex";
        <?php endif; ?>
    });

    // Función para cerrar el popup
    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
</script>

</body>
</html>
