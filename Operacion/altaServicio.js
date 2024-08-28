document.getElementById('servicioForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío tradicional del formulario
    
    // Obtener los valores del formulario
    const lista_reco = document.getElementById('lista_reco').value;
    const fecha_recoleccion = document.getElementById('fecha_recoleccion').value;
    const servicio = document.getElementById('servicio').value;
    const unidad = document.getElementById('unidad').value;

    const origen_destino = document.getElementById('origen_destino').value;
    const unid_factura = document.getElementById('unid_factura').value;
    const local_foranea = document.getElementById('local_foranea').value;
    const sello = document.getElementById('sello').value;
    const operador = document.getElementById('operador').value;
    const texto_operador = document.getElementById('texto_operador').value;
    const ejecutivo = document.getElementById('ejecutivo').value;
    const referencia = document.getElementById('referencia').value;
    const bultos = document.getElementById('bultos').value;
    const doc_fiscal = document.getElementById('doc_fiscal').value;
    const costo = document.getElementById('costo').value;
    const factura = document.getElementById('factura').value;
    const candados = document.getElementById('candados').value;
    const fecha_ingreso = document.getElementById('fecha_ingreso').value;
    const observaciones = document.getElementById('observaciones').value;
    const idcoti = document.getElementById('idcoti').value;

    // Construir el objeto JSON a enviar
    const datos = {
        accion: 'altaservicio',
        datos: {
            lista_reco: lista_reco,
            fecha_recoleccion: fecha_recoleccion,
            servicio: servicio,
            unidad: unidad,
            origen_destino: origen_destino,                
            unid_factura: unid_factura,
            local_foranea: local_foranea,
            sello: sello,
            operador: operador,
            texto_operador: texto_operador,
            ejecutivo: ejecutivo,
            referencia: referencia,
            bultos: bultos,
            doc_fiscal: doc_fiscal,
            costo: costo,
            factura: factura,
            candados: candados,      
            fecha_ingreso: fecha_ingreso,      
            observaciones: observaciones,
            idcoti: idcoti
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
            alert('Servicio guardado correctamente');
            // Redirigir a la página de impresión con el ID de la cotización
            window.location.href = `Infservicio.php?servicioId=${data.servicioId}`;
        } else {
            alert('Error al guardar el servicio');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error en la solicitud');
    });
});

function agregarTextoAlFormulario() {
    var select = document.getElementById("operador");
    var textoSeleccionado = select.options[select.selectedIndex].text;
    document.getElementById("texto_operador").value = textoSeleccionado;    
}