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
$facturas = $usuario->obtenerFacturasfiltros($fechaInicio, $fechaFin);
$facturasXcf = $usuario->obtenerFacturasOtrofiltros($fechaInicio, $fechaFin);

// Definir el nombre del archivo
$nombreArchivo = 'facturas' . ($fechaInicio ? $fechaInicio : 'todos') . '_' . ($fechaFin ? $fechaFin : 'todos') . '.csv';

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
fputcsv($salida, ['Facturas Generales']);
$encabezadosGenerales = [
    'Factura', 'Fecha', 'Precio Base', 'Iva', 'Retención', 'Precio final', 
    'Razón social', 'Ejecutivo', 'Servicio', 'Referencia', 'Complemento', 
    'Fecha de pago', 'Observación', 'Fecha de envio', 'Documento', 'Portal Nippon'
];
fputcsv($salida, $encabezadosGenerales);

foreach ($facturas as $factura) {
    fputcsv($salida, [
        $factura['id_especifico'], 
        $factura['fecha'], 
        $factura['precio_base'], 
        $factura['iva'], 
        $factura['retencion'], 
        $factura['precio_final'], 
        $factura['razon_social'], 
        $factura['contacto_cliente'], 
        $factura['servicio'], 
        $factura['referencia'], 
        $factura['complemento'], 
        $factura['fecha_pago'], 
        $factura['observacion'], 
        $factura['fecha_envio'], 
        $factura['documento'], 
        $factura['portal_nippon']
    ]);
}

// Línea vacía para separación
fputcsv($salida, []);

// Escribir encabezado y datos para Servicios Xcf
fputcsv($salida, ['Facturas Xcf']);
$encabezadosXcf = [
    'Factura', 'Fecha', 'Precio Base', 'Iva', 'Retención', 'Precio final', 
    'Razón social', 'Ejecutivo', 'Servicio', 'Referencia', 'Complemento', 
    'Fecha de pago', 'Observación', 'Fecha de envio', 'Documento', 'Portal Nippon'
];
fputcsv($salida, $encabezadosXcf);

foreach ($facturasXcf as $facturaXcf) {
    fputcsv($salida, [
        $facturaXcf['id_especifico'], 
        $facturaXcf['fecha'], 
        $facturaXcf['precio_base'], 
        $facturaXcf['iva'], 
        $facturaXcf['retencion'], 
        $facturaXcf['precio_final'], 
        $facturaXcf['razon_social'], 
        $facturaXcf['contacto_cliente'], 
        $facturaXcf['servicio'], 
        $facturaXcf['referencia'], 
        $facturaXcf['complemento'], 
        $facturaXcf['fecha_pago'], 
        $facturaXcf['observacion'], 
        $facturaXcf['fecha_envio'], 
        $facturaXcf['documento'], 
        $facturaXcf['portal_nippon']
    ]);
}

// Cerrar el archivo de salida
fclose($salida);

// Enviar salida al navegador y limpiar el búfer de salida
ob_end_flush();
exit();
?>
