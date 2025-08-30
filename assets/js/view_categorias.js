document.addEventListener('DOMContentLoaded', function () {
    obtenerCategorias();
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
                    </tr>
                `;
            });
        });
}
