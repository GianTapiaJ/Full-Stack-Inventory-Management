document.addEventListener('DOMContentLoaded', function () {
    obtenerProductos();

    // Agregar o actualizar producto
    document.getElementById('productoForm').addEventListener('submit', function (e) {
        e.preventDefault();
        
        let id = document.getElementById('productoId').value;
        let nombre = document.getElementById('nombre').value;
        let descripcion = document.getElementById('descripcion').value;
        let precio = document.getElementById('precio').value;
        let stock = document.getElementById('stock').value;
        let id_categoria = document.getElementById('id_categoria').value;

        let formData = new FormData();
        formData.append('nombre', nombre);
        formData.append('descripcion', descripcion);
        formData.append('precio', precio);
        formData.append('stock', stock);
        formData.append('id_categoria', id_categoria);

        let url = id ? '/autoservicios/mod/productos/actualizar.php' : '/autoservicios/mod/productos/insertar.php'; // Decide si es actualización o inserción
        if (id) {
            formData.append('id', id);
        }

        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                obtenerProductos();
                document.getElementById('productoForm').reset();
                document.getElementById('productoId').value = ''; // Limpiar ID al terminar
                document.getElementById('btnGuardar').textContent = 'Guardar'; // Cambia el texto del botón
            } else {
                alert('Error al agregar o actualizar el producto');
            }
        });
    });
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
                        
                        <td>
                            <!-- Botón de editar con ícono de lápiz verde -->
                            <button onclick="editarProducto(${producto.id}, '${producto.nombre}', '${producto.descripcion}', ${producto.precio}, ${producto.stock}, ${producto.id_categoria})" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            
                            <!-- Botón de eliminar con ícono de bote de basura rojo -->
                            <button onclick="eliminarProducto(${producto.id})" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
        });
}

function editarProducto(id, nombre, descripcion, precio, stock, id_categoria) {
    document.getElementById('productoId').value = id;
    document.getElementById('nombre').value = nombre;
    document.getElementById('descripcion').value = descripcion;
    document.getElementById('precio').value = precio;
    document.getElementById('stock').value = stock;
    document.getElementById('id_categoria').value = id_categoria;
    
    document.getElementById('btnGuardar').textContent = 'Actualizar'; // Cambia el texto del botón
}

function eliminarProducto(id) {
    if (confirm('¿Está seguro de eliminar este producto?')) {
        fetch('/autoservicios/mod/productos/eliminar.php?id=' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    obtenerProductos();
                } else {
                    alert('Error al eliminar producto');
                }
            });
    }
}
