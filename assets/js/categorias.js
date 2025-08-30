document.addEventListener('DOMContentLoaded', function () {
    obtenerCategorias();

    // Agregar o actualizar categoria
    document.getElementById('categoriasForm').addEventListener('submit', function (e) {
        e.preventDefault();
        
        let id = document.getElementById('categoriasId').value;
        let nombre = document.getElementById('nombre').value;
        let descripcion = document.getElementById('descripcion').value;
        

        let formData = new FormData();
        formData.append('nombre', nombre);
        formData.append('descripcion', descripcion);
        
        

        let url = id ? '/autoservicios/mod/categorias/actualizar.php' : '/autoservicios/mod/categorias/insertar.php'; // Decide si es actualización o inserción
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
                obtenerCategorias();
                document.getElementById('categoriasForm').reset();
                document.getElementById('categoriasId').value = ''; // Limpiar ID al terminar
                document.getElementById('btnGuardar').textContent = 'Guardar'; // Cambia el texto del botón
            } else {
                alert('Error al agregar o actualizar la categoria');
            }
        });
    });
});

function obtenerCategorias() {
    fetch('/autoservicios/mod/categorias/obtener.php')
        .then(response => response.json())
        .then(data => {
            let categoriasLista = document.getElementById('categoriasLista');
            categoriasLista.innerHTML = '';
            data.forEach(categoria => {
                categoriasLista.innerHTML += `
                    <tr>
                        <td>${categoria.id}</td>
                        <td>${categoria.nombre}</td>
                        <td>${categoria.descripcion}</td>
                        <td>
                            <!-- Botón de editar con ícono de lápiz verde -->
                            <button onclick="editarCategorias(${categoria.id}, '${categoria.nombre}', '${categoria.descripcion}')" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </button>

                            <!-- Botón de eliminar con ícono de bote de basura rojo -->
                            <button onclick="eliminarCategorias(${categoria.id})" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
        });
}


function editarCategorias(id, nombre, descripcion, telefono, correo) {
    document.getElementById('categoriasId').value = id;
    document.getElementById('nombre').value = nombre;
    document.getElementById('descripcion').value = descripcion;
    document.getElementById('telefono').value = telefono;
    document.getElementById('correo').value = correo;
    
    document.getElementById('btnGuardar').textContent = 'Actualizar'; // Cambia el texto del botón
}

function eliminarCategorias(id) {
    if (confirm('¿Está seguro de eliminar esta categoria?')) {
        fetch('/autoservicios/mod/categorias/eliminar.php?id=' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    obtenerCategorias();
                } else {
                    alert('Error al eliminar categoria');
                }
            });
    }
}
