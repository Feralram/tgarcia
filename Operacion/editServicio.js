function updateServicio (){
    // Obtener los valores del formulario
    const unidad = document.getElementById('unidad').value;
    const operador = document.getElementById('operador').value;
    const fecha_ingreso = document.getElementById('fecha_ingreso').value;
    const id = document.getElementById('id').value;


    // Construir el objeto JSON a enviar
    const datos = {
        accion: 'updateServicio',
        unidad: unidad,
        operador: operador,
        fecha_ingreso: fecha_ingreso,
        id: id
    };

    // Enviar la solicitud POST usando fetch
    fetch('../controllers/Usuario/controllerUsuario.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(data => {
                throw new Error(data.message || 'Error en la solicitud');
            });
        }
        return response.json();
    })
    .then(data => {
        // Manejar la respuesta del servidor
        if (data.success) {
            alert(data.message || 'Servicio actualizado correctamente');
            window.location.reload(); // Recargar la página
        } else {
            alert(data.message || 'Error al actualizar el servicio');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert(error.message || 'Error en la solicitud');
    });
}