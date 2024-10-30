<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="/pagina.valentina/css/estilos.css">
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
    </style>
</head>
<body>
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
            <tbody id="productos-carrito"></tbody>
        </table>
        <div class="total-container">
            Total: <span class="total-amount" id="total-amount">$0</span>
        </div>
        <button id="confirmar-compra" class="button-confirm">Confirmar Compra</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const productosCarrito = document.getElementById('productos-carrito');
            const totalAmount = document.getElementById('total-amount');
            let total = 0;

            // Obtener carrito del localStorage
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

            if (carrito.length === 0) {
                productosCarrito.innerHTML = "<tr><td colspan='3'>No hay productos en el carrito.</td></tr>";
                return; // Salir si el carrito está vacío
            }

            // Renderizar productos en el carrito
            function renderCarrito() {
                productosCarrito.innerHTML = ""; // Limpiar el contenido previo
                total = 0;

                carrito.forEach((producto, index) => {
                    if (producto.nombre && producto.precio) {
                        total += producto.precio;

                        productosCarrito.innerHTML += `
                            <tr>
                                <td>${producto.nombre}</td>
                                <td>$${producto.precio.toFixed(2)}</td>
                                <td>
                                    <button class="button-edit" onclick="editarProducto(${index})">Editar</button>
                                    <button class="button-delete" onclick="eliminarProducto(${index})">Eliminar</button>
                                </td>
                            </tr>
                        `;
                    } else {
                        console.error("Producto sin nombre o precio:", producto);
                    }
                });

                totalAmount.textContent = `$${total.toFixed(2)}`;
            }

            // Función para eliminar un producto
            window.eliminarProducto = (index) => {
                carrito.splice(index, 1); // Eliminar producto del carrito
                localStorage.setItem('carrito', JSON.stringify(carrito)); // Actualizar el localStorage
                renderCarrito(); // Volver a renderizar el carrito
            };

            // Función para editar un producto
            window.editarProducto = (index) => {
                const nuevoNombre = prompt("Ingrese el nuevo nombre del producto:", carrito[index].nombre);
                const nuevoPrecio = parseFloat(prompt("Ingrese el nuevo precio del producto:", carrito[index].precio));

                if (nuevoNombre && !isNaN(nuevoPrecio)) {
                    carrito[index].nombre = nuevoNombre;
                    carrito[index].precio = nuevoPrecio;
                    localStorage.setItem('carrito', JSON.stringify(carrito)); // Actualizar el localStorage
                    renderCarrito(); // Volver a renderizar el carrito
                } else {
                    alert("Por favor, ingrese un nombre y un precio válidos.");
                }
            };

            // Renderizar carrito inicialmente
            renderCarrito();

            document.getElementById("confirmar-compra").addEventListener("click", () => {
                alert("Compra confirmada.");
                localStorage.removeItem('carrito'); // Limpia el carrito
                window.location.reload();
            });
        });
    </script>
</body>
</html>
