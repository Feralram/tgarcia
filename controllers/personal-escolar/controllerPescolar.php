<?php

include_once('../../models/Pescolar.php');

session_start();

$pescolar = new Pescolar();

if (isset($_POST['accion'])) {
    
    $acc = $_POST['accion'];

    switch ($acc){
        case 1:
            if($pescolar->validarInicioSesion($_POST['email'],$_POST['password'])){
                header('Location: ../../personal-escolar/perfil.php');
            }else{
                header('Location: ../../personal-escolar/iniciar-sesion.html');
            }
            break;
        case 2:
            
            $domicilioCorregido = $_POST['domicilio1'] . ', ' . $_POST['domicilio2'] . ', ' . $_POST['domicilio3'] . ', ' . $_POST['domicilio4'] . ', ' . $_POST['domicilio5'] . ', ' . $_POST['domicilio6'];
            
            $pescolar->actualizarDatos($_SESSION['IdPescolar'],$_POST['fechadenacimiento'], $_POST['edad'], $_POST['nacionalidad'], $_POST['entidaddenacimiento'], $_POST['sexo'], 
            $_POST['curp'], $_POST['estadocivil'], $domicilioCorregido, $_POST['celular'], $_POST['telefono']);
    
            break;
        case 3:
    
            $pescolar->documentosPersonal($_SESSION['IdPescolar']);
    
            break;
        case 4:
    
            $pescolar->DocumentosActualizables($_SESSION['IdPescolar']);
    
            break;
    }
} else {

    switch ($_REQUEST['accion']) {    
        case 0:
            $pescolar->CerrarSesion();
            break;
    
        case 1:
            $pescolar->EliminarDocumentoPersonal($_REQUEST['PescolarId'],$_REQUEST['id']);
            break;       
            
        case 2:
            $pescolar->EliminarPersonal($_REQUEST['id']);
            break;
        
        default:
            # code...
            break;
    }
    
}













?>

