document.addEventListener('DOMContentLoaded', function() {
    const extraInput = document.getElementById('km_extras');
    const inputPrecio = document.getElementById('precio');
    var totalInput = document.getElementById('total');

    function obtenerTotal() {
        const valor1 = parseFloat(extraInput.value) || 0; // Si el valor no es un número, usar 0
        const valor2 = parseFloat(inputPrecio.value) || 0; // Si el valor no es un número, usar 0
        const suma = valor1 + valor2;
        totalInput.value = suma;
    }

    extraInput.addEventListener('input', obtenerTotal);
})


function updateCotizacion (){
    // Obtener los valores del formulario
    const km_extras = document.getElementById('km_extras').value;
    const total = document.getElementById('total').value;
    const id = document.getElementById('id').value;

    // Construir el objeto JSON a enviar
    const datos = {
        accion: 'updateCotizacion',
        km_extras: km_extras,
        total: total,
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
            alert('Cotización actualizada correctamente');
            window.location.reload(); // Recargar la página
        } else {
            alert('Error al actualizar la cotización');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error en la solicitud');
    });
}

function terminarCotizacion (){
    // Obtener los valores del formulario
    const id = document.getElementById('id').value;

    // Construir el objeto JSON a enviar
    const datos = {
        accion: 'terminarCotizacion',
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
            alert('Proceso terminado correctamente');
            // Redirigir a la página de impresión con el ID de la cotización
            window.location.href = `form-registroServicios.php?cotizacionId=${data.cotizacionId}`;
        } else {
            alert('Error al concluir la cotización');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error en la solicitud');
    });
}