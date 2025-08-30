document.addEventListener('DOMContentLoaded', function () {
    obtenerVentas();
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
                    </tr>
                `;
            });
        });
}