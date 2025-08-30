document.addEventListener('DOMContentLoaded', function () {
    obtenerEmpleados();
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
                    </tr>
                `;
            });
        });
}
