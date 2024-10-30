<?php
$servidor = "localhost"; // Cambia si tu servidor no es localhost
$usuario = "root"; // Tu usuario de base de datos
$clave = ""; // Tu contraseña de base de datos
$port = "3306";
$dbname = "kaba_contact";

$conn = new mysqli($servidor, $usuario, $clave, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejar las solicitudes CRUD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'agregar') {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $img_nombre = $_FILES['img']['name'];
        $img_temp = $_FILES['img']['tmp_name'];
        $img_carpeta = 'pagina.valentina/images/'; 
        $img_url = $img_carpeta . basename($img_nombre);
        if (move_uploaded_file($img_temp, $_SERVER['DOCUMENT_ROOT'] . $img_url)) {
            $sql = "INSERT INTO productos (nombre, img, precio, categoria) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssds", $nombre, $img_url, $precio, $categoria);
            $stmt->execute();
        } else {
            echo "Error al cargar la imagen";
        }
        $categoria = $_POST['categoria'];
        $sql = "INSERT INTO productos (nombre, precio, img, categoria) VALUES ('$nombre', '$precio', '$img', '$categoria')";
        $conn->query($sql);
    } elseif (isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
        $id = $_POST['id'];
        $sql = "DELETE FROM productos WHERE id = '$id'";
        $conn->query($sql);
    }
}

// Obtener la lista de productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
$productos = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Productos</title>
    <link rel="stylesheet" href="/pagina.valentina/css/estilos.css">
</head>
<body>

<header>
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
						<i class="fa-solid fa-user"></i>
						<i class="fa-solid fa-basket-shopping"></i>
						<div class="content-shopping-cart">
							<span class="text">Carrito</span>
							<span class="number">(0)</span>
						</div>
						<a href="logout.php" class="logout-link">Cerrar sesión</a>
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
						<li><a href="nosotros.php">Nosotros</a></li>
						<li><a href="contact_us.php">Contáctanos</a></li>
						<li><a href="dashboard.php">Dashboard</a></li>
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
</header>

<section id="crud-productos">
    <h3>Agregar Producto</h3>
    <form id="formAgregarProducto">
        <input type="text" id="nombre" placeholder="Nombre" required>
        <input type="number" id="precio" placeholder="Precio" required>
        <input type="file" name="img" accept="image/*" required>
        <input type="text" id="categoria" placeholder="Categoría" required>
        <button type="submit">Agregar Producto</button>
    </form>

    <h3>Lista de Productos</h3>
    <div class="container_products">
        <?php foreach ($productos as $producto): ?>
            <div class="card" data-id="<?php echo $producto['id']; ?>">
                <p><?php echo $producto['nombre']; ?></p>
                <img src="<?= $producto['img']; ?>" alt="<?= $producto['nombre']; ?>">
                <p>$<?php echo $producto['precio']; ?></p>
                <button class="btn-eliminar">Eliminar</button>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<style>
        /* Estilos generales para el CRUD de productos */

    
    .container-crud {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    .table th, .table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tr:hover {
        background-color: #f1f1f1;
    }

    /* Estilos generales para el formulario de agregar productos */
#formAgregarProducto {
    display: flex;
    flex-direction: column; 
    align-items: flex-start; 
    max-width: 500px; 
    margin: 20px auto; 
    padding: 20px; 
    border: 1px solid #ddd; 
    border-radius: 8px; 
    background-color: #ffffff; 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Título del formulario */
#formAgregarProducto h2 {
    margin-bottom: 20px; /* Espacio entre el título y los campos */
    font-size: 24px; /* Tamaño del título */
    color: #333; /* Color del texto */
}

/* Estilo de las etiquetas */
#formAgregarProducto label {
    margin-bottom: 5px; /* Espacio entre las etiquetas y los campos */
    font-weight: bold; /* Texto en negrita */
}

/* Estilo de los campos de entrada */
#formAgregarProducto input,
#formAgregarProducto select,
#formAgregarProducto textarea {
    width: 100%; /* Ancho completo */
    padding: 10px; /* Espacio interno */
    margin-bottom: 15px; /* Espacio entre campos */
    border: 1px solid #ccc; /* Borde gris */
    border-radius: 4px; /* Bordes redondeados */
    font-size: 16px; /* Tamaño de fuente */
}

/* Estilo para el botón de agregar producto */
#formAgregarProducto button {
    padding: 10px 15px; /* Espacio interno */
    background-color:  hsl(345, 80%, 60%);
    color: white; /* Color del texto */
    border: none; /* Sin borde */
    border-radius: 4px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar */
    transition: background-color 0.3s ease; /* Transición suave */
}

/* Cambia el color del botón al pasar el mouse */
#formAgregarProducto button:hover {
    background-color:  hsl(345, 80%, 60%);; /* Verde más oscuro al pasar el mouse */
}

/* Estilo para el mensaje de éxito */
.mensaje-exito {
    color: #4CAF50; /* Verde */
    font-size: 16px; /* Tamaño del texto */
    margin-top: 10px; /* Espacio superior */
}

/* Estilo para el mensaje de error */
.mensaje-error {
    color: #f44336; /* Rojo */
    font-size: 16px; /* Tamaño del texto */
    margin-top: 10px; /* Espacio superior */
}

h3{
    display: flex;
    justify-content: center;
    font-size: 4rem;
    margin-top: 2rem;
}

/* Responsive */
@media (max-width: 768px) {
    .formAgregarProductos {
        width: 90%; /* Ancho del formulario en dispositivos más pequeños */
    }
}



    /* Estilos para el formulario de productos */
    .form-product {
        display: flex;
        flex-direction: column;
        width: 300px;
        margin-bottom: 20px;
    }

    .form-product label {
        margin-bottom: 5px;
    }

    .form-product input,
    .form-product select {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-product button {
        padding: 10px;
        background-color: #4CAF50; /* Verde */
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-product button:hover {
        background-color: #45a049; /* Verde más oscuro */
    }

    /* Estilos para las tarjetas de productos */
    .card {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 10px;
        margin: 10px;
        width: 250px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .card img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
    }

    .card h3 {
        font-size: 18px;
        margin: 10px 0;
    }

    .card p {
        font-size: 16px;
        color: #333;
    }

    .card button {
        background-color: #2196F3; /* Azul */
        color: white;
        border: none;
        padding: 8px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .card button:hover {
        background-color: #1976D2; /* Azul más oscuro */
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container-crud {
            flex-direction: column;
            align-items: flex-start;
        }

        .table {
            width: 100%;
            font-size: 14px;
        }

        .form-product {
            width: 100%;
        }

        .card {
            width: 90%;
        }
    }

</style>

<script>
    const formAgregarProducto = document.getElementById('formAgregarProducto');
    const containerProducts = document.querySelector('.container_products');

    formAgregarProducto.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const nombre = document.getElementById('nombre').value;
        const precio = document.getElementById('precio').value;
        const img = document.getElementById('img')?.files[0] || null;
        const categoria = document.getElementById('categoria').value;

        // Enviar datos al servidor usando fetch
        fetch('crud_productos.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `accion=agregar&nombre=${nombre}&precio=${precio}&img=${img}&categoria=${categoria}`
        })
        .then(response => response.text())
        .then(data => {
            // Recargar la lista de productos
            location.reload();
        });
    });

    // Manejar eliminación de productos
    containerProducts.addEventListener('click', (e) => {
        if (e.target.classList.contains('btn-eliminar')) {
            const card = e.target.closest('.card');
            const id = card.getAttribute('data-id');

            fetch('crud_productos.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `accion=eliminar&id=${id}`
            })
            .then(response => response.text())
            .then(data => {
                // Recargar la lista de productos
                location.reload();
            });
        }
    });
</script>

<footer>
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
</footer>

</body>
</html>
