const productos = [
    {id:1,nombre:'Mantequilla Corporal D Luchi 300 ML',img:'/pagina.valentina/images/linecorp1.jpg',precio:44.999},
    {id:2,nombre:'Jabón Exfoliante Corporal La Receta 200ML',img:'/pagina.valentina/images/linecorp2.jpg',precio:39.999},
    {id:3,nombre:'Depilador Instantáneo en Spray OMG 60ML',img:'/pagina.valentina/images/linecorp3.jpg',precio:24.999},
    {id:4,nombre:'Mantequilla Corporal Hidratante OMG 220 Grs',img:'/pagina.valentina/images/linecorp4.jpg',precio:39.990},
    {id:5,nombre:'Dúo Bronceo Perfecto Gel D Luchi (2 Productos)',img:'/pagina.valentina/images/linecorp5.jpg',precio:69.999},
    {id:6,nombre:'Dúo Bronceo Perfecto Zanahoria y Canela D Luchi',img:'/pagina.valentina/images/linecorp6.jpg',precio:69.999},
    {id:7,nombre:'Dúo Axilas Perfectas Kaba - OMG',img:'/pagina.valentina/images/linecorp7.jpg',precio:62.999},
    {id:8,nombre:'Kit Piernas Perfectas OMG (3 Productos)',img:'/pagina.valentina/images/linecorp8.jpg',precio:74.999},
    {id:9,nombre:'Ungüento Corporal Grnde La Receta 120G',img:'/pagina.valentina/images/linecorp9.jpg',precio:79.999},
    {id:10,nombre:'Kit de Bronceo Básico D Luchi (4 Productos)',img:'/pagina.valentina/images/linecorp10.jpg',precio:89.999},
  ];
  
  carrito = []
  
  const container_productos = document.querySelector('.container_products');
  const btn_carrito = document.querySelector('.btn_carrito');
  const cart = document.querySelector('.cart');
  
  const restarProducto = (e) => {
    let item = e.target.getAttribute('id_product') 
    carrito.splice(parseInt(carrito.indexOf(item)),1)
    mostrarCarrito();
  }
  
  const eliminarProducto = (e) => {
    let item = e.target.getAttribute('id_product');
    
    carrito = carrito.filter((id_producto) => {
        return id_producto !== item;
    });
  
    mostrarCarrito();
  }
  
  const mostrarProductos = () => {
    productos.forEach(items => {
        const card_producto = document.createElement('div');
        const nombre_producto = document.createElement('p');
        const precio_producto = document.createElement('p');
        const btn_agregar_carrito = document.createElement('button');
        const image_card = document.createElement('img')
  
        nombre_producto.textContent = items.nombre
        precio_producto.textContent = '$' + items.precio
        btn_agregar_carrito.setAttribute('id_product', items.id)        
        btn_agregar_carrito.classList.add('button');
        btn_agregar_carrito.textContent = 'AGREGAR';
        btn_agregar_carrito.addEventListener('click', agregarCarrito);
        card_producto.classList.add('card');
        image_card.setAttribute('src', items.img);
        image_card.setAttribute('id', 'img-card');
        nombre_producto.setAttribute('id', 'Nomjuego');
        precio_producto.setAttribute('id', 'PrecioJuego')
  
        card_producto.appendChild(nombre_producto)
        card_producto.appendChild(image_card)
        card_producto.appendChild(precio_producto)
        card_producto.appendChild(btn_agregar_carrito)
        
        
        container_productos.appendChild(card_producto)
  
    });
  }
  
  const mostrarCarrito = () => {
    cart.innerHTML = ''
    let lista = [...new Set(carrito)]; 
    
    lista.forEach(item => {
        const todos_productos = productos.filter(productos => {
            return productos.id === parseInt(item);
        })
  
        let cont = 0;
  
        for(let id of carrito) {
            if(id === item) {
                cont++;
            }
        }
       
        const card_producto_cart = document.createElement('div');
        const name = document.createElement('p');
        const price = document.createElement('p');
        const contador = document.createElement('p');
        const btn_suma = document.createElement('button');
        const btn_resta = document.createElement('button');
        const btn_eliminar = document.createElement('button');
        btn_suma.setAttribute('id_product', todos_productos[0].id);
        btn_resta.setAttribute('id_product',todos_productos[0].id);
        btn_eliminar.setAttribute('id_product',todos_productos[0].id);
  
        name.textContent = todos_productos[0].nombre;
        price.textContent = todos_productos[0].precio;
        btn_suma.textContent = '+';
        btn_resta.textContent = '-'
        btn_eliminar.textContent = 'X';
        contador.textContent = cont;
  
        card_producto_cart.classList.add('card_producto')
        card_producto_cart.appendChild(name);
        card_producto_cart.appendChild(price);
        card_producto_cart.appendChild(contador)
        card_producto_cart.appendChild(btn_suma);
        card_producto_cart.appendChild(btn_resta);
        card_producto_cart.appendChild(btn_eliminar)
  
        btn_suma.addEventListener('click', agregarCarrito);
        btn_resta.addEventListener('click', restarProducto);
        btn_eliminar.addEventListener('click', eliminarProducto)
        cart.appendChild(card_producto_cart);
  
          
    })
  }
  
  const agregarCarrito = (e) => {
    carrito.push(e.target.getAttribute('id_product'));
    mostrarCarrito();
  }
  
  mostrarProductos();
  
  btn_carrito.addEventListener('click', () => {
    cart.classList.toggle('ocult');
  })
  
  function RedendCards() {
    productos.forEach(product => {
        createCard(product.id, product.nombre, product.precio, product.img);
    });
  }
  
  RedendCards();