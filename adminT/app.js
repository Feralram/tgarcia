document.addEventListener('DOMContentLoaded', function() {
    const tariSelect = document.getElementById('tarifario');
    const oridesSelect = document.getElementById('origen')
    const origenSelect = document.getElementById('origen');
    const dimensionSelect = document.getElementById('dimension')

        // Obtén el elemento input por su ID
    var precioInput = document.getElementById('precio');

    // Asigna un valor al input
    precioInput.value = 0; // O cualquier otro valor que desees asignar

    let idTarifario;

    tariSelect.addEventListener('change', function() {
        idTarifario = this.value;

        if (idTarifario==1) {
            fetchTarifarioGeneral();
        }else if(idTarifario==2){
            fetchTarifarioComun();
        }else if(idTarifario==3){
            fetchTarifarioComunRefri();
        }else if(idTarifario==4){
            fetchTarifarioProexi();
        }else{
            // Si no hay selección, limpiar las opciones de dimensiones
            oridesSelect.innerHTML = '<option selected>Selecciona...</option>';
            dimensionSelect.innerHTML = '<option selected>Selecciona...</option>';
            precioInput.value = 0;
        }
    });
    //TARIFARIO GENERAL
    function fetchTarifarioGeneral() {
        fetch('../controllers/Usuario/controllerUsuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                accion: 'obtenerTarifarioGeneral'
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            updateGenerales(data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }
    
    function updateGenerales(data) {
        oridesSelect.innerHTML = '<option selected>Selecciona...</option>';
        data.forEach(dat => {
            const option = document.createElement('option');
            option.value = dat.Id_tarifagen;
            option.textContent = `${dat.origen} - ${dat.destino}`;
            oridesSelect.appendChild(option);
        });
    }

     //TARIFARIO COMUN
     function fetchTarifarioComun() {
        fetch('../controllers/Usuario/controllerUsuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                accion: 'obtenerTarifarioComun'
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            updateComunes(data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }
    
    function updateComunes(data) {
        oridesSelect.innerHTML = '<option selected>Selecciona...</option>';
        data.forEach(dat => {
            const option = document.createElement('option');
            option.value = dat.Id_tarifacom;
            option.textContent = `${dat.origen} - ${dat.destino}`;
            oridesSelect.appendChild(option);
        });
    }

     //TARIFARIO COMUN REFRIGERADOS
     function fetchTarifarioComunRefri() {
        fetch('../controllers/Usuario/controllerUsuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                accion: 'obtenerTarifarioComunRefri'
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            updateComunesRefri(data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }
    
    function updateComunesRefri(data) {
        oridesSelect.innerHTML = '<option selected>Selecciona...</option>';
        data.forEach(dat => {
            const option = document.createElement('option');
            option.value = dat.Id_tarifacomref;
            option.textContent = `${dat.origen} - ${dat.destino}`;
            oridesSelect.appendChild(option);
        });
    }

    //TARIFARIO PROEXI
    function fetchTarifarioProexi() {
    fetch('../controllers/Usuario/controllerUsuario.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            accion: 'obtenerTarifarioProexi'
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        updateProexi(data);
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}

function updateProexi(data) {
    oridesSelect.innerHTML = '<option selected>Selecciona...</option>';
    data.forEach(dat => {
        const option = document.createElement('option');
        option.value = dat.Id_tarifa_proexi;
        option.textContent = `${dat.origen} - ${dat.destino}`;
        oridesSelect.appendChild(option);
    });
}



    

    // AQUI EMPIEZA LAS FUNCIONES PARA TRAER LAS DIMENSIONES EN BASE A EL ORIGEN DESTINO

    origenSelect.addEventListener('change', function() {
        const idOrigen = this.value;

        if (idOrigen) {
            if (idTarifario==1) {
                fetchDimensionesGen(idOrigen);
            }else if(idTarifario==2){
                fetchDimensionesCom(idOrigen);
            }else if(idTarifario==3){
                fetchDimensionesComRefri(idOrigen);
            }else if(idTarifario==4){
                fetchDimensionesProexi(idOrigen);
            }
        } else {
            // Si no hay selección, limpiar las opciones de dimensiones
            dimensionSelect.innerHTML = '<option selected>Selecciona...</option>';
            precioInput.value = 0;
        }
    });

    // Tarifario General
    function fetchDimensionesGen(idOrigen) {
        fetch('../controllers/Usuario/controllerUsuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                accion: 'obtenerDimensionesGen',
                idOrigen: idOrigen
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            updateDimensionGenOptions(data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }    
    function updateDimensionGenOptions(dimensiones) {
        dimensionSelect.innerHTML = '<option selected>Selecciona...</option>';
        dimensiones.forEach(dim => {
            const option = document.createElement('option');
            option.value = dim.monto;
            option.textContent = dim.tipo_unidad;
            dimensionSelect.appendChild(option);
        });
    }

    // Tarifario Comun
    function fetchDimensionesCom(idOrigen) {
        fetch('../controllers/Usuario/controllerUsuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                accion: 'obtenerDimensionesCom',
                idOrigen: idOrigen
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            updateDimensionComOptions(data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }    
    function updateDimensionComOptions(dimensiones) {
        dimensionSelect.innerHTML = '<option selected>Selecciona...</option>';
        dimensiones.forEach(dim => {
            const option = document.createElement('option');
            option.value = dim.monto;
            option.textContent = dim.tipo_unidad;
            dimensionSelect.appendChild(option);
        });
    }

        // Tarifario Comun
    function fetchDimensionesCom(idOrigen) {
        fetch('../controllers/Usuario/controllerUsuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                accion: 'obtenerDimensionesCom',
                idOrigen: idOrigen
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            updateDimensionComOptions(data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }    
    function updateDimensionComOptions(dimensiones) {
        dimensionSelect.innerHTML = '<option selected>Selecciona...</option>';
        dimensiones.forEach(dim => {
            const option = document.createElement('option');
            option.value = dim.monto;
            option.textContent = dim.tipo_unidad;
            dimensionSelect.appendChild(option);
        });
    }
 
    // Tarifario Comun Refrigerados
    function fetchDimensionesComRefri(idOrigen) {
        fetch('../controllers/Usuario/controllerUsuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                accion: 'obtenerDimensionesComRefri',
                idOrigen: idOrigen
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            updateDimensionComRefriOptions(data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }    
    function updateDimensionComRefriOptions(dimensiones) {
        dimensionSelect.innerHTML = '<option selected>Selecciona...</option>';
        dimensiones.forEach(dim => {
            const option = document.createElement('option');
            option.value = dim.monto;
            option.textContent = dim.tipo_unidad;
            dimensionSelect.appendChild(option);
        });
    }

    // Tarifario Proexi
    function fetchDimensionesProexi(idOrigen) {
        fetch('../controllers/Usuario/controllerUsuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                accion: 'obtenerDimensionesProexi',
                idOrigen: idOrigen
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            updateDimensionProexiOptions(data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }    
    function updateDimensionProexiOptions(dimensiones) {
        dimensionSelect.innerHTML = '<option selected>Selecciona...</option>';
        dimensiones.forEach(dim => {
            const option = document.createElement('option');
            option.value = dim.monto;
            option.textContent = dim.tipo_unidad;
            dimensionSelect.appendChild(option);
        });
    }

    dimensionSelect.addEventListener('change', function() {
            // Obtén el value de la opción seleccionada
        var valorSeleccionado = dimensionSelect.value;
        
        // Asigna el valor seleccionado al input precio
        precioInput.value = valorSeleccionado;
    });


    


});

// Función para manejar el envío del formulario
document.getElementById('cotizacionForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío tradicional del formulario
    
    // Obtener los valores del formulario
    const cliente = document.getElementById('cliente').value;
    const tarifario = document.getElementById('tarifario').value;
    const origen = document.getElementById('origen').value;
    const codigo_postal = document.getElementById('codigo_postal').value;
    const peso = document.getElementById('peso').value;
    const dimension = document.getElementById('dimension').value;
    const precio = document.getElementById('precio').value;
    const texto_dimension = document.getElementById('texto_dimension').value;
    const texto_origen = document.getElementById('texto_origen').value;
    const num_bultos = document.getElementById('num_bultos').value;
    const km_adicionales = document.getElementById('km_adicionales').value;

    // Construir el objeto JSON a enviar
    const datos = {
        accion: 'altacotizacion',
        datos: {
            cliente: cliente,
            tarifario: tarifario,
            origen: origen,
            codigo_postal: codigo_postal,
            peso: peso,
            dimension: dimension,
            precio: precio,                
            num_bultos: num_bultos,
            texto_dimension: texto_dimension,
            texto_origen: texto_origen,
            km_adicionales: km_adicionales
        }
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
            alert('Cotización guardada correctamente');
            // Redirigir a la página de impresión con el ID de la cotización
            window.location.href = `Infcotizacion.php?cotizacionId=${data.cotizacionId}`;
        } else {
            alert('Error al guardar la cotización');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error en la solicitud');
    });
});

function agregarTextoAlFormulario() {
    var select = document.getElementById("dimension");
    var selectorigen = document.getElementById("origen");
    var textoSeleccionado = select.options[select.selectedIndex].text;
    var textoOrigen = selectorigen.options[selectorigen.selectedIndex].text;
    document.getElementById("texto_dimension").value = textoSeleccionado;
    document.getElementById("texto_origen").value = textoOrigen;
}