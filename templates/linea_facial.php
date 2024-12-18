<html>
    <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Kaba oficial</title>
		<link rel="stylesheet" href="/pagina.valentina/css/estilos.css" />
	</head>
	<body>
		<header>
			<div class="container-hero">
				<div class="container hero">
					<div class="customer-support">
						<i class="fa-solid fa-headset"></i>
						<div class="content-customer-support">
							<span class="text">Atencion al cliente</span>
							<span class="number">(+57)3043809326</span>
						</div>
					</div>

					<div class="container-logo">
						<h1 class="logo"><a href="/">KABA</a></h1>
					</div>

					<div class="container-user">
					<i class="fa-solid fa-basket-shopping"></i>
						<div class="btn_carrito">
							<span class="text">Carrito</span>
							<div class="cart ocult">
							<div class="cart-items"></div>
							<button class="btn-compra" onclick="irAPaginaCompras()">Ir a Compras</button>
						</div>
					</div>
				</div>
			</div>

			<div class="container-navbar">
				<nav class="navbar container">
					<i class="fa-solid fa-bars"></i>
					<ul class="menu">
						<li><a href="index.php">Inicio</a></li>
						<li><a href="#container-options">Linea capilar</a></li>
						<li><a href="#container_specials">Linea corporal</a></li>
						<li><a href="#container_facial">Linea facial</a></li>
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

        <?php
$servidor = "localhost"; // Cambia si tu servidor no es localhost
$usuario = "root"; // Tu usuario de base de datos
$clave = ""; // Tu contraseña de base de datos
$port = "3306";
$dbname = "kaba_contact";

// Conectar a la base de datos
$conn = new mysqli($servidor, $usuario, $clave, $dbname);

$categoria = 'facial'; // Filtrar por categoría

$sql = "SELECT * FROM productos WHERE categoria = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $categoria);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Línea Capilar</title>
    <link rel="stylesheet" href="/pagina.valentina/css/estilos.css">
</head>
<body>
    <header>
        <h1 class="titleCapi">Línea Capilar</h1>
    </header>
    <main class="container_products">
        <?php while ($producto = $result->fetch_assoc()): ?>
            <div class="producto">
                <img src="<?= $producto['img']; ?>" alt="<?= $producto['nombre']; ?>">
                <h3><?= $producto['nombre']; ?></h3>
                <p>Precio: <?= $producto['precio']; ?></p>
            </div>
        <?php endwhile; ?>
    </main>
</body>
</html>

<?php
$conn->close();
?>

        </div>




        <footer class="footer">
			<div class="container container-footer">
				<div class="menu-footer">
					<div class="contact-info">
						<p class="title-footer">Información de Contacto</p>
						<ul>
							<li>
								Dirección: Carrera 17 Barrio Centenario
							</li>
							<li>Teléfono: (+57) 3043809326</li>
							<li>EmaiL: kabanaturals@gmail.com</li>
						</ul>
						<div class="social-icons">
							<a href="https://www.facebook.com/profile.php?id=61564221783717&mibextid=ZbWKwL"><i class="fa-brands fa-facebook"></i></a>
									
							<a href="https://www.instagram.com/kaba_montenegro?igsh=MXQ3NmZndm9hZ21yaQ=="><i class="fa-brands fa-instagram"></i></a>
							
							<a href="https://whatsapp.com/dl/"><i class="fa-brands fa-whatsapp"></i></a>

							<a href="https://youtube.com/@valentinaandica-q1g?si=tM6izhh_IXvBu1MX"><i class="fa-brands fa-youtube"></i></a>
									
							<a href=" https://www.threads.net/@valentina__andica?invite=2"><i class="fa-brands fa-threads"></i></a>
						
							<a href="https://www.tiktok.com/@kabaoficial10?_t=8pdwXRdXePF&_r=1"><i class="fa-brands fa-tiktok"></i></a>
							</div>
					</div>
					<div class="information">
						<p class="title-footer">Información</p>
						<ul>
							<li><a href="#">Acerca de Nosotros</a></li>
							<li><a href="#">Información de Envios</a></li>
							<li><a href="#">Politicas de Privacidad</a></li>
							<li><a href="#">Términos y condiciones</a></li>
							<li><a href="#">Contactános</a></li>
						</ul>
					</div>

					<div class="my-account">
						<p class="title-footer">Sobre nosotros</p>

						<ul>
							<li><a href="#"> Quienes somos</a></li>
							<li><a href="#">Nuestras tiendas</a></li>
							<li><a href="#">Lista de deseos</a></li>
							<li><a href="#">Reembolsos</a></li>
						</ul>
					</div>

					<div class="newsletter">
						<p class="title-footer">Suscribete</p>

						<div class="content">
							<p>
								Suscríbete a nuestros boletines ahora y mantente al
								día con nuevas colecciones y ofertas exclusivas.
							</p>
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







        <script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>

        <script src="/pagina.valentina/JS/scriptfacial.js"></script>
</html>