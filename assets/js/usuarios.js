document.addEventListener('DOMContentLoaded', function () {
    obtenerUsuarios();

    document.getElementById('usuariosForm').addEventListener('submit', function (e) {
        e.preventDefault();

        let id = document.getElementById('usuariosId').value;
        let rol = document.getElementById('rol').value;
        let user = document.getElementById('user').value;
        let password = document.getElementById('password').value;

        let formData = new FormData();
        formData.append('rol', rol);
        formData.append('user', user);
        formData.append('password', password);

        let url = id ? '/autoservicios/mod/usuarios/actualizar.php' : '/autoservicios/mod/usuarios/insertar.php';
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
                obtenerUsuarios();
                document.getElementById('usuariosForm').reset();
                document.getElementById('usuariosId').value = '';
                document.getElementById('btnGuardar').textContent = 'Guardar';
            } else {
                alert('Error al agregar o actualizar el usuario');
            }
        });
    });
});

function obtenerUsuarios() {
    fetch('/autoservicios/mod/usuarios/obtener.php')
        .then(response => response.json())
        .then(data => {
            let usuariosLista = document.getElementById('usuariosLista');
            usuariosLista.innerHTML = '';
            data.forEach(usuario => {
                usuariosLista.innerHTML += 
                    `<tr>
                        <td>${usuario.id}</td>
                        <td>${usuario.rol}</td>
                        <td>${usuario.user}</td>
                        <td>${usuario.password}</td>
                        <td>${usuario.hash}</td>
                        <td>
                            <!-- Botón de editar con ícono de lápiz verde -->
                            <button onclick="editarUsuarios(${usuario.id}, '${usuario.rol}', '${usuario.user}')" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </button>

                            <!-- Botón de eliminar con ícono de bote de basura rojo -->
                            <button onclick="eliminarUsuarios(${usuario.id})" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>

                    </tr>`;
            });
        });
}

function editarUsuarios(id, user) {
    document.getElementById('usuariosId').value = id;
    document.getElementById('rol').value = rol;
    document.getElementById('user').value = user;
    document.getElementById('password').value = '';

    document.getElementById('btnGuardar').textContent = 'Actualizar';
}

function eliminarUsuarios(id) {
    if (confirm('¿Está seguro de eliminar este usuario?')) {
        fetch('/autoservicios/mod/usuarios/eliminar.php?id=' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    obtenerUsuarios();
                } else {
                    alert('Error al eliminar usuario');
                }
            });
    }
}
