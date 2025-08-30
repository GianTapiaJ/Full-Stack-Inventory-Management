document.addEventListener('DOMContentLoaded', function () {
    obtenerClientes();

    // Agregar o actualizar empleado
    document.getElementById('clientesForm').addEventListener('submit', function (e) {
        e.preventDefault();
        
        let id = document.getElementById('clientesId').value;
        let nombre = document.getElementById('nombre').value;
        let direccion = document.getElementById('direccion').value;
        let telefono = document.getElementById('telefono').value;
        let correo = document.getElementById('correo').value;
        

        let formData = new FormData();
        formData.append('nombre', nombre);
        formData.append('direccion', direccion);
        formData.append('telefono', telefono);
        formData.append('correo', correo);
        

        let url = id ? '/autoservicios/mod/clientes/actualizar.php' : '/autoservicios/mod/clientes/insertar.php'; // Decide si es actualización o inserción
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
                obtenerClientes();
                document.getElementById('clientesForm').reset();
                document.getElementById('clientesId').value = ''; // Limpiar ID al terminar
                document.getElementById('btnGuardar').textContent = 'Guardar'; // Cambia el texto del botón
            } else {
                alert('Error al agregar o actualizar el empleado');
            }
        });
    });
});

function obtenerClientes() {
    fetch('/autoservicios/mod/clientes/obtener.php')
        .then(response => response.json())
        .then(data => {
            let clientesLista = document.getElementById('clientesLista');
            clientesLista.innerHTML = '';
            data.forEach(empleado => {
                clientesLista.innerHTML += `
                    <tr>
                        <td>${empleado.id}</td>
                        <td>${empleado.nombre}</td>
                         <td>${empleado.direccion}</td>
                        <td>${empleado.telefono}</td>
                        <td>${empleado.correo}</td>
                        <td>
                            <!-- Botón de editar con ícono de lápiz verde -->
                            <button onclick="editarClientes(${empleado.id}, '${empleado.nombre}', '${empleado.direccion}', '${empleado.telefono}', '${empleado.correo}')" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </button>

                            <!-- Botón de eliminar con ícono de bote de basura rojo -->
                            <button onclick="eliminarClientes(${empleado.id})" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
        });
}

function editarClientes(id, nombre, direccion, telefono, correo) {
    document.getElementById('clientesId').value = id;
    document.getElementById('nombre').value = nombre;
    document.getElementById('direccion').value = direccion;
    document.getElementById('telefono').value = telefono;
    document.getElementById('correo').value = correo;
    
    document.getElementById('btnGuardar').textContent = 'Actualizar'; // Cambia el texto del botón
}

function eliminarClientes(id) {
    if (confirm('¿Está seguro de eliminar este empleado?')) {
        fetch('/autoservicios/mod/clientes/eliminar.php?id=' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    obtenerClientes();
                } else {
                    alert('Error al eliminar empleado');
                }
            });
    }
}
