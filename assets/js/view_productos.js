document.addEventListener('DOMContentLoaded', function () {
    obtenerProductos();
});

function obtenerProductos() {
    fetch('/autoservicios/mod/productos/obtener.php')
        .then(response => response.json())
        .then(data => {
            let productosLista = document.getElementById('productosLista');
            productosLista.innerHTML = '';
            data.forEach(producto => {
                productosLista.innerHTML += `
                    <tr>
                        <td>${producto.id}</td>
                        <td>${producto.nombre}</td>
                        <td>${producto.precio}</td>
                        <td>${producto.stock}</td>
                        <td>${producto.id_categoria}</td>
                    </tr>
                `;
            });
        });
}
