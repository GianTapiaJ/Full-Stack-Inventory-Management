document.addEventListener('DOMContentLoaded', function () {
    obtenerDetallesVentas();
});
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
                    </tr>
                `;
            });
        });
}
