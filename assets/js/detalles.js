document.addEventListener('DOMContentLoaded', function () {
    obtenerDetallesVentas();

    // Agregar o actualizar detalle de venta
    document.getElementById('detalleVentaForm').addEventListener('submit', function (e) {
        e.preventDefault();
        
        let id = document.getElementById('detalleVentaId').value;
        let id_venta = document.getElementById('id_venta').value;
        let id_producto = document.getElementById('id_producto').value;
        let cantidad = document.getElementById('cantidad').value;
        let precio_unitario = document.getElementById('precio_unitario').value;
        let subtotal = document.getElementById('subtotal').value;

        let formData = new FormData();
        formData.append('id_venta', id_venta);
        formData.append('id_producto', id_producto);
        formData.append('cantidad', cantidad);
        formData.append('precio_unitario', precio_unitario);
        formData.append('subtotal', subtotal);

        let url = id ? '/autoservicios/mod/detalles/actualizar.php' : '/autoservicios/mod/detalles/insertar.php'; // Decide si es actualización o inserción
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
                obtenerDetallesVentas();
                document.getElementById('detalleVentaForm').reset();
                document.getElementById('detalleVentaId').value = ''; // Limpiar ID al terminar
                document.getElementById('btnGuardarDetalle').textContent = 'Guardar Detalle'; // Cambia el texto del botón
            } else {
                alert('Error al agregar o actualizar el detalle de la venta');
            }
        });
    });

    // Calcular subtotal automáticamente
    document.getElementById('cantidad').addEventListener('input', calcularSubtotal);
    document.getElementById('precio_unitario').addEventListener('input', calcularSubtotal);
});

function calcularSubtotal() {
    let cantidad = document.getElementById('cantidad').value;
    let precio_unitario = document.getElementById('precio_unitario').value;
    if (cantidad && precio_unitario) {
        let subtotal = cantidad * precio_unitario;
        document.getElementById('subtotal').value = subtotal.toFixed(2);
    }
}

function obtenerDetallesVentas() {
    fetch('/autoservicios/mod/detalles/obtener.php')
        .then(response => response.json())
        .then(data => {
            let detallesVentaLista = document.getElementById('detallesVentaLista');
            detallesVentaLista.innerHTML = '';
            data.forEach(detalle => {
                detallesVentaLista.innerHTML += `
                    <tr>
                        <td>${detalle.id}</td>
                        <td>${detalle.id_venta}</td>
                        <td>${detalle.id_producto}</td>
                        <td>${detalle.cantidad}</td>
                        <td>${detalle.precio_unitario}</td>
                        <td>${detalle.subtotal}</td>
                        <td>
                            <!-- Botón de editar con ícono de lápiz verde -->
                            <button onclick="editarDetalleVenta(${detalle.id}, ${detalle.id_venta}, ${detalle.id_producto}, ${detalle.cantidad}, ${detalle.precio_unitario}, ${detalle.subtotal})" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            
                            <!-- Botón de eliminar con ícono de bote de basura rojo -->
                            <button onclick="eliminarDetalleVenta(${detalle.id})" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
        });
}

function editarDetalleVenta(id, id_venta, id_producto, cantidad, precio_unitario, subtotal) {
    document.getElementById('detalleVentaId').value = id;
    document.getElementById('id_venta').value = id_venta;
    document.getElementById('id_producto').value = id_producto;
    document.getElementById('cantidad').value = cantidad;
    document.getElementById('precio_unitario').value = precio_unitario;
    document.getElementById('subtotal').value = subtotal;
    
    document.getElementById('btnGuardarDetalle').textContent = 'Actualizar Detalle'; // Cambia el texto del botón
}

function eliminarDetalleVenta(id) {
    if (confirm('¿Está seguro de eliminar este detalle de venta?')) {
        fetch('/autoservicios/mod/detalles/eliminar.php?id=' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    obtenerDetallesVentas();
                } else {
                    alert('Error al eliminar detalle de venta');
                }
            });
    }
}
