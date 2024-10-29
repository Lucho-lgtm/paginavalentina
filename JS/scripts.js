const productos = [
  {id:1,nombre:'Shampoo de Argan Para Cabello Seco La Receta 500ML',img:'/pagina.valentina/images/linecapi1.jpg',precio:39.999},
  {id:2,nombre:'Kit Crecimiento Intensivo Kaba (5 Productos)',img:'/pagina.valentina/images/linecapi2.jpg',precio:199.999},
  {id:3,nombre:'Tratamiento Capilar Repolarizador Kaba 230ML',img:'/pagina.valentina/images/linecapi3.jpg',precio:39.999},
  {id:4,nombre:'Tonico Capilar para Cabello y Barba La Receta 120 ML',img:'/pagina.valentina/images/linecapi4.jpg',precio:39.999},
  {id:5,nombre:'Kit Clinicamente Demostrado Kaba (3 Productos)',img:'/pagina.valentina/images/linecapi5.jpg',precio:111.999},
  {id:6,nombre:'Kit Para Cabello Graso La Receta',img:'/pagina.valentina/images/linecapi6.jpg',precio:119.990},
  {id:7,nombre:'Kit Capilar Caba',img:'/pagina.valentina/images/linecapi7.jpg',precio:69.999},
  {id:8,nombre:'Kit Control Caspa La Receta',img:'/pagina.valentina/images/linecapi8.jpg',precio:124.999},
  {id:9,nombre:'Kit Crecimiento Acelerado para Cabello Graso',img:'/pagina.valentina/images/linecapi9.jpg',precio:144.999},
  {id:10,nombre:'Kit Crecimiento y reparación',img:'/pagina.valentina/images/linecapi10.jpg',precio:109.999},
];

// Inicialización del carrito como un array vacío
let carrito = [];

// Selección de elementos del DOM
const container_productos = document.querySelector('.container_products');
const btn_carrito = document.querySelector('.btn_carrito');
const cart = document.querySelector('.cart');

// Función para restar cantidad de un producto en el carrito
const restarProducto = (e) => {
  let item = e.target.getAttribute('id_product');
  carrito.splice(parseInt(carrito.indexOf(item)), 1);
  mostrarCarrito();
};

// Función para eliminar un producto del carrito completamente
const eliminarProducto = (e) => {
  let item = e.target.getAttribute('id_product');
  carrito = carrito.filter((id_producto) => id_producto !== item);
  mostrarCarrito();
};

// Función para mostrar los productos en el contenedor principal
const mostrarProductos = () => {
  productos.forEach((items) => {
    const card_producto = document.createElement('div');
    const nombre_producto = document.createElement('p');
    const precio_producto = document.createElement('p');
    const btn_agregar_carrito = document.createElement('button');
    const image_card = document.createElement('img');

    nombre_producto.textContent = items.nombre;
    precio_producto.textContent = '$' + items.precio;
    btn_agregar_carrito.setAttribute('id_product', items.id);
    btn_agregar_carrito.classList.add('button');
    btn_agregar_carrito.textContent = 'AGREGAR';
    btn_agregar_carrito.addEventListener('click', agregarCarrito);
    
    card_producto.classList.add('card');
    image_card.setAttribute('src', items.img);
    image_card.setAttribute('id', 'img-card');
    nombre_producto.setAttribute('id', 'Nomjuego');
    precio_producto.setAttribute('id', 'PrecioJuego');

    card_producto.appendChild(nombre_producto);
    card_producto.appendChild(image_card);
    card_producto.appendChild(precio_producto);
    card_producto.appendChild(btn_agregar_carrito);

    container_productos.appendChild(card_producto);
  });
};

// Función para mostrar el contenido del carrito
const mostrarCarrito = () => {
  cart.innerHTML = ''; // Limpiar el contenido del carrito
  let lista = [...new Set(carrito)]; // Obtener productos únicos en el carrito

  lista.forEach((item) => {
    const todos_productos = productos.filter((producto) => producto.id === parseInt(item));
    let cont = 0;

    // Contar la cantidad de cada producto en el carrito
    for (let id of carrito) {
      if (id === item) {
        cont++;
      }
    }

    // Crear elementos del DOM para cada producto en el carrito
    const card_producto_cart = document.createElement('div');
    const name = document.createElement('p');
    const price = document.createElement('p');
    const contador = document.createElement('p');
    const btn_suma = document.createElement('button');
    const btn_resta = document.createElement('button');
    const btn_eliminar = document.createElement('button');

    btn_suma.setAttribute('id_product', todos_productos[0].id);
    btn_resta.setAttribute('id_product', todos_productos[0].id);
    btn_eliminar.setAttribute('id_product', todos_productos[0].id);

    name.textContent = todos_productos[0].nombre;
    price.textContent = 'Precio: $' + todos_productos[0].precio;
    contador.textContent = 'Cantidad: ' + cont;
    btn_suma.textContent = '+';
    btn_resta.textContent = '-';
    btn_eliminar.textContent = 'X';

    card_producto_cart.classList.add('card_producto');
    card_producto_cart.appendChild(name);
    card_producto_cart.appendChild(price);
    card_producto_cart.appendChild(contador);
    card_producto_cart.appendChild(btn_suma);
    card_producto_cart.appendChild(btn_resta);
    card_producto_cart.appendChild(btn_eliminar);

    btn_suma.addEventListener('click', agregarCarrito);
    btn_resta.addEventListener('click', restarProducto);
    btn_eliminar.addEventListener('click', eliminarProducto);

    cart.appendChild(card_producto_cart);
  });

  // Botón "Ir a Compras" para proceder con la compra
  const btnIrACompras = document.createElement('button');
  btnIrACompras.textContent = 'Ir a Compras';
  btnIrACompras.classList.add('btn-compra');
  btnIrACompras.addEventListener('click', irAPaginaCompras);
  cart.appendChild(btnIrACompras);
};

// Función para agregar productos al carrito
const agregarCarrito = (e) => {
  carrito.push(e.target.getAttribute('id_product'));
  localStorage.setItem('carrito', JSON.stringify(carrito));
  mostrarCarrito();
};

// Función para redirigir a la página de compras
function irAPaginaCompras() {
  window.location.href = '/pagina.valentina/templates/compras.php'; // Cambia la ruta según sea necesario
}

// Inicializar la visualización de los productos
mostrarProductos();

// Evento para mostrar y ocultar el carrito al hacer clic en el botón
btn_carrito.addEventListener('click', () => {
  cart.classList.toggle('ocult');
});

// Función adicional para renderizar productos si se requiere otra función de carga
function RedendCards() {
  productos.forEach((product) => {
    createCard(product.id, product.nombre, product.precio, product.img);
  });
}

RedendCards();

  