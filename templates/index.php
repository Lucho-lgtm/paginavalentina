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

		<section class="banner">
			<div class="content-banner">
				<p>KABA</p>
				<h2>Productos 100% Naturales <br />¡Lo hacemos por ti!</h2>
				<a href="#">Comprar ahora</a>
			</div>
		</section>

		<main class="main-content">
			<section class="container container-features">
				<div class="card-feature">
					<i class="fa-solid fa-plane-up"></i>
					<div class="feature-content">
						<span>Envios nacionales e internacionales</span>
						<p>Envios gratis por compras superiores a $200.000</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-wallet"></i>
					<div class="feature-content">
						<span>Contrareembolso</span>
						<p>100% garantía de devolución de dinero</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-gift"></i>
					<div class="feature-content">
						<span>Tarjeta regalo especial</span>
						<p>Ofrece bonos especiales con regalo</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-headset"></i>
					<div class="feature-content">
						<span>Servicio al cliente 24/7</span>
						<p>Contactanos 24/7 al (+57) 3043809326</p>
					</div>
				</div>
			</section>

			<section class="container top-categories">
				<h1 class="heading-1">Nuestras categorias</h1>
				<div class="container-categories">
					<div class="card-category category-moca">
						<p>Capilar</p>
						<span><a class="moreCapilar" href="/pagina.valentina/templates/linea_capilar.php">Ver más</a></span>
					</div>
					<div class="card-category category-expreso">
						<p>Corporal</p>
						<span><a class="moreCapilar" href="/pagina.valentina/templates/linea_corporal.php">Ver más</a></span>
					</div>
					<div class="card-category category-capuchino">
						<p>Facial</p>
						<span><a class="moreCapilar" href="/pagina.valentina/templates/linea_facial.php">Ver más</a></span>
					</div>
				</div>
			</section>

			<section class="container top-products">
				<h1 class="heading-1">Linea Capilar</h1>

				<div id="container-options">
					<span class="active">Destacados</span>
					<span>Más recientes</span>
					<span>Mejores Vendidos</span>
				</div>

				<div class="carousel-container">
					<div class="carousel">
					  <!-- Producto 1 -->
					  <div class="card-product">
						<div class="container-img">
						  <img src="/pagina.valentina/images/producto1.jpg" alt="Shampoo" />
						  <span class="discount">-5%</span>
						  <div class="button-group">
							<span><i class="fa-regular fa-eye"></i></span>
							<span><i class="fa-regular fa-heart"></i></span>
							<span><i class="fa-solid fa-code-compare"></i></span>
						  </div>
						</div>
						<div class="content-card-product">
						  <div class="stars">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-regular fa-star"></i>
						  </div>
						  <h3>Shampoo de cebolla</h3>
						  <span class="add-cart"><i class="fa-solid fa-basket-shopping"></i></span>
						  <p class="price">$35.000 <span>$40.000</span></p>
						</div>
					  </div>
					  <!-- Producto 2 -->
					  <div class="card-product">
						<div class="container-img">
						  <img src="/pagina.valentina/images/producto2.jpg" alt="biomascarilla" />
						  <span class="discount">-10%</span>
						  <div class="button-group">
							<span><i class="fa-regular fa-eye"></i></span>
							<span><i class="fa-regular fa-heart"></i></span>
							<span><i class="fa-solid fa-code-compare"></i></span>
						  </div>
						</div>
						<div class="content-card-product">
						  <div class="stars">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-regular fa-star"></i>
							<i class="fa-regular fa-star"></i>
						  </div>
						  <h3>Biomascarilla kaba</h3>
						  <span class="add-cart"><i class="fa-solid fa-basket-shopping"></i></span>
						  <p class="price">$40.000 <span>$50.000</span></p>
						</div>
					  </div>
					  <!-- Producto 3 -->
					  <div class="card-product">
						<div class="container-img">
						  <img src="/pagina.valentina/images/producto3.jpg" alt="Acondicionador" />
						  <div class="button-group">
							<span><i class="fa-regular fa-eye"></i></span>
							<span><i class="fa-regular fa-heart"></i></span>
							<span><i class="fa-solid fa-code-compare"></i></span>
						  </div>
						</div>
						<div class="content-card-product">
						  <div class="stars">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
						  </div>
						  <h3>Acondicionador kaba</h3>
						  <span class="add-cart"><i class="fa-solid fa-basket-shopping"></i></span>
						  <p class="price">$40.000</p>
						</div>
					  </div>
					  <!-- Producto 4 -->
					  <div class="card-product">
						<div class="container-img">
						  <img src="/pagina.valentina/images/producto4.jpg" alt="Tonico" />
						  <div class="button-group">
							<span><i class="fa-regular fa-eye"></i></span>
							<span><i class="fa-regular fa-heart"></i></span>
							<span><i class="fa-solid fa-code-compare"></i></span>
						  </div>
						</div>
						<div class="content-card-product">
						  <div class="stars">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-regular fa-star"></i>
						  </div>
						  <h3>Tonico de crecimiento</h3>
						  <span class="add-cart"><i class="fa-solid fa-basket-shopping"></i></span>
						  <p class="price">$35.000</p>
						</div>
					  </div>
					</div>
				  </div>
			</section>	  

			<section class="gallery">
				<img
					src="/pagina.valentina/images/modelo1.jpg"
					alt="Gallery Img1"
					class="gallery-img-1"
				/><img
					src="/pagina.valentina/images/modelo2.jpg"
					alt="Gallery Img2"
					class="gallery-img-2"
				/><img
					src="/pagina.valentina/images/modelo4.jpg"
					alt="Gallery Img3"
					class="gallery-img-3"
				/><img
					src="/pagina.valentina/images/modelo5.jpg"
					alt="Gallery Img4"
					class="gallery-img-4"
				/><img
					src="/pagina.valentina/images/modelo6.jpg"
					alt="Gallery Img5"
					class="gallery-img-5"
				/>
			</section>

			<section id="container_specials">
				<h1 class="heading-1">Linea Corporal</h1>

				<div id="container-options">
					<span class="active">Destacados</span>
					<span>Más recientes</span>
					<span>Mejores Vendidos</span>
				</div>

				<div class="carousel-container">
					<div class="carousel">
					  <!-- Producto 1 -->
					  <div class="card-product">
						<div class="container-img">
							<img src="/pagina.valentina/images/kits.jpg" alt="kit kaba" />
						  <span class="discount">-5%</span>
						  <div class="button-group">
							<span><i class="fa-regular fa-eye"></i></span>
							<span><i class="fa-regular fa-heart"></i></span>
							<span><i class="fa-solid fa-code-compare"></i></span>
						  </div>
						</div>
						<div class="content-card-product">
						  <div class="stars">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-regular fa-star"></i>
						  </div>
						  <h3>Kit emergencia capilar</h3>
										<span class="add-cart">
											<i class="fa-solid fa-basket-shopping"></i>
										</span>
										<p class="price">$250.000 <span>$265.000</span></p>
						</div>
					  </div>
					  <!-- Producto 2 -->
					  <div class="card-product">
						<div class="container-img">
							<img src="/pagina.valentina/images/kits2.jpg" alt="Duo corporal.jpg" />
						  <span class="discount">-10%</span>
						  <div class="button-group">
							<span><i class="fa-regular fa-eye"></i></span>
							<span><i class="fa-regular fa-heart"></i></span>
							<span><i class="fa-solid fa-code-compare"></i></span>
						  </div>
						</div>
						<div class="content-card-product">
						  <div class="stars">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-regular fa-star"></i>
							<i class="fa-regular fa-star"></i>
						  </div>
						  <h3>Duo perfecto</h3>
										<span class="add-cart">
											<i class="fa-solid fa-basket-shopping"></i>
										</span>
										<p class="price">$62.000 <span>$50.000</span></p>
						</div>
					  </div>
					  <!-- Producto 3 -->
					  <div class="card-product">
						<div class="container-img">
							<img src="/pagina.valentina/images/kits3.jpg" alt="Perfumes kaba" />
						  <div class="button-group">
							<span><i class="fa-regular fa-eye"></i></span>
							<span><i class="fa-regular fa-heart"></i></span>
							<span><i class="fa-solid fa-code-compare"></i></span>
						  </div>
						</div>
						<div class="content-card-product">
						  <div class="stars">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
						  </div>
						  <h3>Perfume para el cabello</h3>
										<span class="add-cart">
											<i class="fa-solid fa-basket-shopping"></i>
										</span>
										<p class="price">$137.000 <span>$150.000</span></p>
						</div>
					  </div>
					  <!-- Producto 4 -->
					  <div class="card-product">
						<div class="container-img">
							<img src="/pagina.valentina/images/kits4.jpg" alt="Kids" />
						  <div class="button-group">
							<span><i class="fa-regular fa-eye"></i></span>
							<span><i class="fa-regular fa-heart"></i></span>
							<span><i class="fa-solid fa-code-compare"></i></span>
						  </div>
						</div>
						<div class="content-card-product">
						  <div class="stars">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-regular fa-star"></i>
						  </div>
						  <h3>Kaba Kids</h3>
						  <span class="add-cart">
							<i class="fa-solid fa-basket-shopping"></i>
						</span>
						<p class="price">$80.000</p>
						</div>
					  </div>
					</div>
					
				</div>
			</section>
			
			<script src="script.js"></script>
			
			<section id="container_facial">
				<h1 class="heading-1"> Linea Facial</h1>

				<div id="container-options">
					<span class="active">Destacados</span>
					<span>Más recientes</span>
					<span>Mejores Vendidos</span>
				</div>

				<div class="carousel-container">
					<div class="carousel">
					  <!-- Producto 1 -->
					  <div class="card-product">
						<div class="container-img">
							<img src="/pagina.valentina/images/mascarilla.jpg" alt="mascarilla kaba" />
							<span class="discount">-15%</span>
						  <div class="button-group">
							<span><i class="fa-regular fa-eye"></i></span>
							<span><i class="fa-regular fa-heart"></i></span>
							<span><i class="fa-solid fa-code-compare"></i></span>
						  </div>
						</div>
						<div class="content-card-product">
						  <div class="stars">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-regular fa-star"></i>
						  </div>
						  <h3>Mascarilla kaba</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$65.000<span>$80.000</span></p>
						</div>
					  </div>
					  <!-- Producto 2 -->
					  <div class="card-product">
						<div class="container-img">
							<img
							src="/pagina.valentina/images/locion.jpg" alt="locion.jpg"/>
							<span class="discount">-12%</span>
						  <div class="button-group">
							<span><i class="fa-regular fa-eye"></i></span>
							<span><i class="fa-regular fa-heart"></i></span>
							<span><i class="fa-solid fa-code-compare"></i></span>
						  </div>
						</div>
						<div class="content-card-product">
						  <div class="stars">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-regular fa-star"></i>
							<i class="fa-regular fa-star"></i>
						  </div>
						  <h3>Locion astringente</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$30.000 <span>$42.000</span></p>
						</div>
					  </div>
					  <!-- Producto 3 -->
					  <div class="card-product">
						<div class="container-img">
							<img src="/pagina.valentina/images/tonico.jpg" alt="tonico" />
							<span class="discount">-13%</span>
						  <div class="button-group">
							<span><i class="fa-regular fa-eye"></i></span>
							<span><i class="fa-regular fa-heart"></i></span>
							<span><i class="fa-solid fa-code-compare"></i></span>
						  </div>
						</div>
						<div class="content-card-product">
						  <div class="stars">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
						  </div>
						  <h3>Tonico despigmentante</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$49.000 <span>$62.000</span></p>
						</div>
					  </div>
					  <!-- Producto 4 -->
					  <div class="card-product">
						<div class="container-img">
							<img src="/pagina.valentina/images/oro.jpg" alt="aceite facial" />
						  <div class="button-group">
							<span><i class="fa-regular fa-eye"></i></span>
							<span><i class="fa-regular fa-heart"></i></span>
							<span><i class="fa-solid fa-code-compare"></i></span>
						  </div>
						</div>
						<div class="content-card-product">
						  <div class="stars">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-regular fa-star"></i>
						  </div>
						  <h3>Aceite facial</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$50.000</p>
						</div>
					  </div>
					</div>
			</section>
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
	</body>
</html>