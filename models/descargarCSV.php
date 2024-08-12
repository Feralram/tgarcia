<?php
session_start();
include_once('../models/Usuario.php');

// Limpiar el búfer de salida (evitar espacios o saltos de línea antes de enviar encabezados)
ob_start();

// Crear una instancia del objeto Usuario
$usuario = new Usuario();

// Obtener las fechas de inicio y fin del rango
$fechaInicio = isset($_GET['fechaInicio']) ? $_GET['fechaInicio'] : null;
$fechaFin = isset($_GET['fechaFin']) ? $_GET['fechaFin'] : null;

// Obtener los datos con el rango de fechas proporcionado
$servicios = $usuario->obtenerServicios($fechaInicio, $fechaFin);
$serviciosXcf = $usuario->obtenerServiciosXcf($fechaInicio, $fechaFin);

// Definir el nombre del archivo
$nombreArchivo = 'servicios_' . ($fechaInicio ? $fechaInicio : 'todos') . '_' . ($fechaFin ? $fechaFin : 'todos') . '.csv';

// Encabezados para la descarga del archivo
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment;filename="' . $nombreArchivo . '"');
header('Pragma: no-cache');
header('Expires: 0');

// Abrir el archivo para escritura en modo de salida
$salida = fopen('php://output', 'w');

// Añadir BOM para soportar UTF-8
fputs($salida, "\xEF\xBB\xBF");

// Escribir encabezado y datos para Servicios Generales
fputcsv($salida, ['Servicios Generales']);
$encabezadosGenerales = [
    'Cliente', 'Fecha recoleccion', 'Servicio', 'Unidad', 'Placas', 'Econ', 
    'Unid-Factura', 'Origen y Destino', 'Local o Foranea', 'Sello', 'Operador', 
    'Ejecutivo', 'Referencia', 'Bultos', 'Doc-Fiscal', 'Factura', 'Costo', 
    'Observaciones'
];
fputcsv($salida, $encabezadosGenerales);

foreach ($servicios as $servicio) {
    fputcsv($salida, [
        $servicio['cliente'], 
        $servicio['fecha_recoleccion'], 
        $servicio['servicio'], 
        $servicio['unidad'], 
        $servicio['Placas'], 
        $servicio['eco'], 
        $servicio['unid_factura'], 
        $servicio['oriDestino'], 
        $servicio['local_foranea'], 
        $servicio['sello'], 
        $servicio['Nombre_completo'], 
        $servicio['ejecutivo'], 
        $servicio['referencia'], 
        $servicio['bultos'], 
        $servicio['doc_fiscal'], 
        $servicio['factura'], 
        $servicio['costo'], 
        $servicio['observaciones']
    ]);
}

// Línea vacía para separación
fputcsv($salida, []);

// Escribir encabezado y datos para Servicios Xcf
fputcsv($salida, ['Servicios Xcf']);
$encabezadosXcf = [
    'Cliente', 'Fecha recoleccion', 'Cliente', 'Unidad', 'Placas', 'Econ', 
    'Unid-Factura', 'Origen y Destino', 'Local o Foranea', 'Sello', 'Operador', 
    'Cliente que solicita', 'Referencia', 'Bultos', 'Doc-Fiscal', 'Factura', 
    'Costo', 'Observaciones'
];
fputcsv($salida, $encabezadosXcf);

foreach ($serviciosXcf as $servXcf) {
    fputcsv($salida, [
        $servXcf['cliente'], 
        $servXcf['fecha_recoleccion'], 
        $servXcf['cliente'], 
        $servXcf['unidad'], 
        $servXcf['placas'], 
        $servXcf['eco'], 
        $servXcf['unid_factura'], 
        $servXcf['oriDestino'], 
        $servXcf['local_foranea'], 
        $servXcf['sello'], 
        $servXcf['Nombre_completo'], 
        $servXcf['cliente_solicita'], 
        $servXcf['referencia'], 
        $servXcf['bultos'], 
        $servXcf['doc_fiscal'], 
        $servXcf['factura'], 
        $servXcf['costo'], 
        $servXcf['observaciones']
    ]);
}

// Cerrar el archivo de salida
fclose($salida);

// Enviar salida al navegador y limpiar el búfer de salida
ob_end_flush();
exit();
?>
