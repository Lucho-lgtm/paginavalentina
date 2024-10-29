<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="/pagina.valentina/css/estilos.css">
</head>
<body>
    <div class="compras-container">
        <h1 class="compras-title">Carrito de Compras</h1>
        <div id="productos-carrito" class="cart-table"></div>
        <div class="total-container">
            Total: <span class="total-amount" id="total-amount">$0</span>
        </div>
        <button id="confirmar-compra" class="button-confirm">Confirmar Compra</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const productosCarrito = document.getElementById('productos-carrito');
            const totalAmount = document.getElementById('total-amount');
            let total = 0;

            carrito.forEach(id => {
                // Simulación de detalles del producto, reemplazar con llamada AJAX real
                const producto = { id: id, nombre: `Producto ${id}`, precio: Math.floor(Math.random() * 100) + 10 };
                total += producto.precio;

                productosCarrito.innerHTML += `
                    <div class="cart-item">
                        <p class="cart-item-name">${producto.nombre}</p>
                        <p class="cart-item-price">$${producto.precio}</p>
                    </div>
                `;
            });

            totalAmount.textContent = `$${total}`;

            document.getElementById("confirmar-compra").addEventListener("click", () => {
                fetch('/pagina.valentina/php/guardar_compra.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ carrito })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Compra confirmada.");
                        localStorage.removeItem('carrito'); // Limpia el carrito
                        window.location.reload();
                    } else {
                        alert("Error al realizar la compra.");
                    }
                });
            });
        });
    </script>

    <style>
        /* Carrito de Compras Estilos */
.compras-container {
    padding: 20px;
    max-width: 600px;
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

.cart-table {
    padding: 15px;
}

.cart-item {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.cart-item-name {
    font-weight: 500;
}

.cart-item-price {
    color: #555;
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
    text-align: center;
    cursor: pointer;
    margin-top: 20px;
    transition: background-color 0.3s ease;
}

.button-confirm:hover {
    background-color: #0056b3;
}

    </style>
</body>
</html>
