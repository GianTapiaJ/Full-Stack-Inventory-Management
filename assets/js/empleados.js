document.addEventListener('DOMContentLoaded', function () {
    obtenerEmpleados();

    // Agregar o actualizar empleado
    document.getElementById('empleadosForm').addEventListener('submit', function (e) {
        e.preventDefault();
        
        let id = document.getElementById('empleadosId').value;
        let nombre = document.getElementById('nombre').value;
        let puesto = document.getElementById('puesto').value;
        let telefono = document.getElementById('telefono').value;
        let correo = document.getElementById('correo').value;
        

        let formData = new FormData();
        formData.append('nombre', nombre);
        formData.append('puesto', puesto);
        formData.append('telefono', telefono);
        formData.append('correo', correo);
        

        let url = id ? '/autoservicios/mod/empleados/actualizar.php' : '/autoservicios/mod/empleados/insertar.php'; // Decide si es actualización o inserción
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
                obtenerEmpleados();
                document.getElementById('empleadosForm').reset();
                document.getElementById('empleadosId').value = ''; // Limpiar ID al terminar
                document.getElementById('btnGuardar').textContent = 'Guardar'; // Cambia el texto del botón
            } else {
                alert('Error al agregar o actualizar el empleado');
            }
        });
    });
});

function obtenerEmpleados() {
    fetch('/autoservicios/mod/empleados/obtener.php')
        .then(response => response.json())
        .then(data => {
            let empleadosLista = document.getElementById('empleadosLista');
            empleadosLista.innerHTML = '';
            data.forEach(empleado => {
                empleadosLista.innerHTML += `
                    <tr>
                        <td>${empleado.id}</td>
                        <td>${empleado.nombre}</td>
                         <td>${empleado.puesto}</td>
                        <td>${empleado.telefono}</td>
                        <td>${empleado.correo}</td>
                        <td>
                            <!-- Botón de editar con ícono de lápiz verde -->
                            <button onclick="editarEmpleados(${empleado.id}, '${empleado.nombre}', '${empleado.puesto}', '${empleado.telefono}', '${empleado.correo}')" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </button>

                            <!-- Botón de eliminar con ícono de bote de basura rojo -->
                            <button onclick="eliminarEmpleados(${empleado.id})" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
        });
}

function editarEmpleados(id, nombre, puesto, telefono, correo) {
    document.getElementById('empleadosId').value = id;
    document.getElementById('nombre').value = nombre;
    document.getElementById('puesto').value = puesto;
    document.getElementById('telefono').value = telefono;
    document.getElementById('correo').value = correo;
    
    document.getElementById('btnGuardar').textContent = 'Actualizar'; // Cambia el texto del botón
}

function eliminarEmpleados(id) {
    if (confirm('¿Está seguro de eliminar este empleado?')) {
        fetch('/autoservicios/mod/empleados/eliminar.php?id=' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    obtenerEmpleados();
                } else {
                    alert('Error al eliminar empleado');
                }
            });
    }
}
