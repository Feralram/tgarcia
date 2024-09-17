function terminarFactura (){
    // Obtener los valores del formulario
    const id = document.getElementById('id').value;

    // Construir el objeto JSON a enviar
    const datos = {
        accion: 'terminarFactura',
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
            throw new Error('Error en la solicitud');
        }
        return response.json();
    })
    .then(data => {
        // Manejar la respuesta del servidor
        if (data.success) {
            alert('Factura terminada correctamente');
            // Redirigir a la página de impresión con el ID de la cotización
            window.location.href = `listaServicios.php`;
        } else {
            alert('Error al concluir la factura');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error en la solicitud');
    });
}


function updateFactura (){
    // Obtener los valores del formulario
    const complemento = document.getElementById('complemento').value;
    const fecha_pago = document.getElementById('fecha_pago').value;
    const referencia = document.getElementById('referencia').value;
    const id = document.getElementById('id').value;


    // Construir el objeto JSON a enviar
    const datos = {
        accion: 'updateFactura',
        complemento: complemento,
        fecha_pago: fecha_pago,
        referencia: referencia,
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
            alert(data.message || 'Factura actualizada correctamente');
            window.location.reload(); // Recargar la página
        } else {
            alert(data.message || 'Error al actualizar la factura');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert(error.message || 'Error en la solicitud');
    });
}