document.addEventListener('DOMContentLoaded', function () {
    obtenerVentas();

    // Agregar o actualizar venta
    document.getElementById('ventaForm').addEventListener('submit', function (e) {
        e.preventDefault();
        
        let id = document.getElementById('ventaId').value;
        let id_cliente = document.getElementById('id_cliente').value;
        let id_empleado = document.getElementById('id_empleado').value;
        let fecha_venta = document.getElementById('fecha_venta').value;
        let total = document.getElementById('total').value;

        let formData = new FormData();
        formData.append('id_cliente', id_cliente);
        formData.append('id_empleado', id_empleado);
        formData.append('fecha_venta', fecha_venta);
        formData.append('total', total);

        let url = id ? '/autoservicios/mod/ventas/actualizar.php' : '/autoservicios/mod/ventas/insertar.php'; // Decide si es actualización o inserción
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
                obtenerVentas();
                document.getElementById('ventaForm').reset();
                document.getElementById('ventaId').value = ''; // Limpiar ID al terminar
                document.getElementById('btnGuardar').textContent = 'Guardar'; // Cambia el texto del botón
            } else {
                alert('Error al agregar o actualizar la venta');
            }
        });
    });
});

function obtenerVentas() {
    fetch('/autoservicios/mod/ventas/obtener.php')
        .then(response => response.json())
        .then(data => {
            let ventasLista = document.getElementById('ventasLista');
            ventasLista.innerHTML = '';
            data.forEach(venta => {
                ventasLista.innerHTML += `
                    <tr>
                        <td>${venta.id}</td>
                        <td>${venta.id_cliente}</td>
                        <td>${venta.id_empleado}</td>
                        <td>${venta.fecha_venta}</td>
                        <td>${venta.total}</td>
                        <td>
                            <!-- Botón de editar con ícono de lápiz verde -->
                            <button onclick="editarVenta(${venta.id}, ${venta.id_cliente}, ${venta.id_empleado}, '${venta.fecha_venta}', ${venta.total})" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </button>

                            <!-- Botón de eliminar con ícono de bote de basura rojo -->
                            <button onclick="eliminarVenta(${venta.id})" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
        });
}

function editarVenta(id, id_cliente, id_empleado, fecha_venta, total) {
    document.getElementById('ventaId').value = id;
    document.getElementById('id_cliente').value = id_cliente;
    document.getElementById('id_empleado').value = id_empleado;
    document.getElementById('fecha_venta').value = fecha_venta;
    document.getElementById('total').value = total;
    
    document.getElementById('btnGuardar').textContent = 'Actualizar'; // Cambia el texto del botón
}

function eliminarVenta(id) {
    if (confirm('¿Está seguro de eliminar esta venta?')) {
        fetch('/autoservicios/mod/ventas/eliminar.php?id=' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    obtenerVentas();
                } else {
                    alert('Error al eliminar venta');
                }
            });
    }
}
