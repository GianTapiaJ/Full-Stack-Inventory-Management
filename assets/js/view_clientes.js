document.addEventListener('DOMContentLoaded', function () {
    obtenerClientes();
});

function obtenerClientes() {
    fetch('/autoservicios/mod/clientes/obtener.php')
        .then(response => response.json())
        .then(data => {
            let clientesLista = document.getElementById('clientesLista');
            clientesLista.innerHTML = '';
            data.forEach(cliente => {
                clientesLista.innerHTML += `
                    <tr>
                        <td>${cliente.id}</td>
                        <td>${cliente.nombre}</td>
                        <td>${cliente.direccion}</td>
                        <td>${cliente.telefono}</td>
                        <td>${cliente.correo}</td>
                    </tr>
                `;
            });
        });
}