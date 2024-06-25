<?php
include_once('db_connection.php');


class Usuario extends Connect {
    private $id;
    private $nombre;
    private $apellidoP;
    private $apellidoM;
    private $puesto_id;
    private $status;
    private $usuario;
    private $psw;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellidoP() {
        return $this->apellidoP;
    }

    public function setApellidoP($apellidoP) {
        $this->apellidoP = $apellidoP;
    }
    public function getApellidoM() {
        return $this->apellidoM;
    }

    public function setApellidoM($apellidoM) {
        $this->apellidoM = $apellidoM;
    }

    public function getPuestoid() {
        return $this->puesto_id;
    }

    public function setPuestoid($puesto_id) {
        $this->puesto_id = $puesto_id;
    }
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    public function getPsw() {
        return $this->psw;
    }

    public function setPsw($psw) {
        $this->psw = $psw;
    }


    
    // Método para validar el inicio de sesión
    public function validarInicioSesion($usu, $psw) {
        $usu = $this->conexion->real_escape_string($usu); // Evita SQL Injection
        $psw = $this->conexion->real_escape_string($psw); // Evita SQL Injection

        $query = "SELECT Usuario.Nombre, Usuario.ApellidoP, Usuario.ApellidoM, Usuario.Usu_id, Usuario.Puesto_id, puestos.Nombre as Puesto
        FROM Usuario 
        INNER JOIN puestos 
        ON Usuario.Puesto_id = puestos.Puesto_id
        WHERE Usuario = '$usu' 
        AND psw = '$psw' 
        ";

        $resultado = $this->conexion->query($query);

        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();

            $this->almacenarDatosEnSesion($fila);
            // $this->validarAccesoDocumentos($fila['Id']);
            // Usuario válido
            return [
                'success' => true,
                'data' => $fila['Puesto_id']
            ];
        } else {
            // Usuario inválido
            return [
                'success' => false               
            ];
        }
    }

    private function almacenarDatosEnSesion($fila) {
        $ncompleto = $fila['Nombre'].' '.$fila['ApellidoP'].' '.$fila['ApellidoM'];
        $_SESSION['IdUsu'] = $fila['Usu_id'];
        $_SESSION['NombreUsu'] = $ncompleto;
        $_SESSION['PuestoUsu'] = $fila['Puesto'];

    }

    private function validarAccesoDocumentos($estudianteId) {
        $documents = "SELECT COUNT(*) AS numDocumentos, SUM(CASE WHEN ISNULL(Aprobado) THEN 1 ELSE 0 END) AS numDocumentosNoAprobados FROM documentosaspirantes WHERE EstudianteId = '$estudianteId'";
        // $documents = "SELECT
        //                 COUNT(*) AS numDocumentos,
        //                 SUM(CASE WHEN COALESCE(Aprobado, 0) = 0 THEN 1 ELSE 0 END) AS numDocumentosNoAprobados
        //             FROM
        //                 documentosaspirantes
        //             WHERE
        //                 EstudianteId = '$estudianteId';";
        $resultado = $this->conexion->query($documents);

        $fila = $resultado->fetch_assoc();
        if ($fila['numDocumentos'] > 0) {
            if ($fila['numDocumentosNoAprobados'] > 0) {
                //Ha subido documentos pero tiene por lo menos uno no aprobado, puede acceder a documentos
                $_SESSION['DocumentosAlumno'] = true;
            }else {
                //Documentos aprobados
                $_SESSION['DocumentosAlumno'] = false;
            }
        }else {
            //No ha subido documentos, puede acceder a documentos
            $_SESSION['DocumentosAlumno'] = true;
        }
    }

    public function CerrarSesion(){
                // Lógica para cerrar la sesión (por ejemplo, cuando el usuario hace clic en "Cerrar sesión")
        if (isset($_SESSION['usu'])) {
            // Borra todas las variables de sesión
            $_SESSION = array();

            // Invalida la cookie de sesión actual (si existe)
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time() - 3600, '/');
            }

            // Destruye la sesión
            session_destroy();

            // Redirige a la página de inicio de sesión o a donde desees
            header('Location: ../../index.html');
        } else {
            // Si el usuario no estaba autenticado, redirige a una página de inicio de sesión
            header('Location: ../../index.html');
        }
    }

    public function actualizarDatos($id, $fechadenacimiento, $edad, $meses, $peso, $lentes, $cartilla, $vacunas, $ortopedico, $sexo, 
    $nacionalidad, $entidaddenacimiento,$domicilio, $telefono, $correoelectronico, $tparentesco, $tnombre, $tfechadenacimiento, $tsexo, $testadocivil, $tgradodeestudios,
    $tcurp, $tnacionalidad, $tentidaddenacimiento, $ttipodedocumento, $tdomicilio, $ttelefono, $tcorreoelectronico, $tnecesidadespecial,
    $therramientasdeapoyo, $tgrupoindigena, $tsituacionlaboral) {

        //Alumno

        $id = $this->conexion->real_escape_string($id); // Evita SQL Injection                                        
       //$nombre = $this->conexion->real_escape_string($nombre); // Evita SQL Injection
        //$grado = $this->conexion->real_escape_string($grado); // Evita SQL Injection
        $fechadenacimiento = $this->conexion->real_escape_string($fechadenacimiento); // Evita SQL Injection
        $edad = $this->conexion->real_escape_string($edad); // Evita SQL Injection
        $meses = $this->conexion->real_escape_string($meses); // Evita SQL Injection
        $peso = $this->conexion->real_escape_string($peso); // Evita SQL Injection
        $lentes = $this->conexion->real_escape_string($lentes); // Evita SQL Injection
        $cartilla = $this->conexion->real_escape_string($cartilla); // Evita SQL Injection
        $vacunas = $this->conexion->real_escape_string($vacunas); // Evita SQL Injection
        $ortopedico = $this->conexion->real_escape_string($ortopedico); // Evita SQL Injection
        $sexo = $this->conexion->real_escape_string($sexo); // Evita SQL Injection
        $nacionalidad = $this->conexion->real_escape_string($nacionalidad); // Evita SQL Injection
        $entidaddenacimiento = $this->conexion->real_escape_string($entidaddenacimiento); // Evita SQL Injection
        $domicilio = $this->conexion->real_escape_string($domicilio); // Evita SQL Injection
        $telefono = $this->conexion->real_escape_string($telefono); // Evita SQL Injection
        // $redsocial = $this->conexion->real_escape_string($redsocial); // Evita SQL Injection
        // $nombrecuenta = $this->conexion->real_escape_string($nombrecuenta); // Evita SQL Injection
        $correoelectronico = $this->conexion->real_escape_string($correoelectronico); // Evita SQL Injection

        //Tutor

        $tparentesco = $this->conexion->real_escape_string($tparentesco); // Evita SQL Injection
        $tnombre = $this->conexion->real_escape_string($tnombre); // Evita SQL Injection
        $tfechadenacimiento = $this->conexion->real_escape_string($tfechadenacimiento); // Evita SQL Injection
        $tsexo = $this->conexion->real_escape_string($tsexo); // Evita SQL Injection
        $testadocivil = $this->conexion->real_escape_string($testadocivil); // Evita SQL Injection
        $tgradodeestudios = $this->conexion->real_escape_string($tgradodeestudios); // Evita SQL Injection
        $tcurp = $this->conexion->real_escape_string($tcurp); // Evita SQL Injection
        $tnacionalidad = $this->conexion->real_escape_string($tnacionalidad); // Evita SQL Injection
        $tentidaddenacimiento = $this->conexion->real_escape_string($tentidaddenacimiento); // Evita SQL Injection
        $ttipodedocumento = $this->conexion->real_escape_string($ttipodedocumento); // Evita SQL Injection
        $tdomicilio = $this->conexion->real_escape_string($tdomicilio); // Evita SQL Injection
        $ttelefono = $this->conexion->real_escape_string($ttelefono); // Evita SQL Injection
        $tcorreoelectronico = $this->conexion->real_escape_string($tcorreoelectronico); // Evita SQL Injection
        $tnecesidadespecial = $this->conexion->real_escape_string($tnecesidadespecial); // Evita SQL Injection
        $therramientasdeapoyo = $this->conexion->real_escape_string($therramientasdeapoyo); // Evita SQL Injection
        $tgrupoindigena = $this->conexion->real_escape_string($tgrupoindigena); // Evita SQL Injection
        $tsituacionlaboral = $this->conexion->real_escape_string($tsituacionlaboral); // Evita SQL Injection
        

        $query = 
        "UPDATE aspirantes 
        SET FechaDeNacimiento='$fechadenacimiento', Edad='$edad', Meses='$meses', Peso='$peso', Lentes='$lentes', Cartilla='$cartilla',
        Vacunas='$vacunas', Ortopedico='$ortopedico', Sexo='$sexo', Nacionalidad='$nacionalidad', EntidadDeNacimiento='$entidaddenacimiento', Domicilio='$domicilio', Telefono='$telefono',
        CorreoElectronico='$correoelectronico', Comentario='None'
        WHERE Id = '$id' ";

        $query2 = 
        "INSERT INTO tutores 
        (Id, Nombre, Parentesco, FechaDeNacimiento, Sexo, EstadoCivil, GradoDeEstudios,Curp, Nacionalidad, EntidadDeNacimiento, tipodedocumento,
        Direccion, Telefono, CorreoElectronico, NecesidadEspecial, HerramientasDeApoyo, GrupoIndigena, SituacionLaboral, IdAlumno) 
        VALUES (UUID(), '$tnombre','$tparentesco','$tfechadenacimiento','$tsexo','$testadocivil','$tgradodeestudios','$tcurp','$tnacionalidad','$tentidaddenacimiento',
        '$ttipodedocumento','$tdomicilio','$ttelefono','$tcorreoelectronico','$tnecesidadespecial','$therramientasdeapoyo','$tgrupoindigena','$tsituacionlaboral','$id')
        ";

    

        // die($query2);

        
        $resultado1 = $this->conexion->prepare($query);

        $resultado2 = $this->conexion->prepare($query2);

        

        if ($resultado1->execute() && $resultado2->execute()) {
            // Imprime un fragmento de JavaScript para mostrar una alerta

            $_SESSION['ComentarioAlumno'] = 'None';
            $response = array("success" => True, "message" => "Datos registradas correctamente.");
            echo json_encode($response);

            
        } else {
            // En caso de error, puedes mostrar una alerta de error
            $response = array("success" => False, "message" => "Ha ocurrido un error al actualizar los datos, intenta de nuevo mas tarde.");
            echo json_encode($response);
            // echo'<script type="text/javascript">
            //     alert("Ha ocurrido un error al actualizar los datos.");
            //     window.location.href="../../alumnos/perfil.php";
            //     </script>';

        }


    }


    public function documentosAlumnos($id,$curp){

        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Carpeta de destino (ajusta la ruta según tu configuración)
            $carpetaDestino = '../../documentosAlumnos/' . $curp . "/";

            if (!is_dir($carpetaDestino)) {
                // Verifica si la carpeta no existe
                if (mkdir($carpetaDestino, 0755, true)) {
                    echo "La carpeta '$carpetaDestino' se ha creado correctamente \n.";
                } else {
                    echo "Error al crear la carpeta '$carpetaDestino'.";
                }
            } else {
                echo "La carpeta '$carpetaDestino' ya existe, no se creó de nuevo.";
            }
        
            // Verifica si se enviaron archivos
            if (isset($_FILES['archivos'])) {
                $archivos = $_FILES['archivos'];
        
                // Itera a través de los archivos
                for ($i = 0; $i < count($archivos['tmp_name']); $i++) {
                    if ($archivos['error'][$i] === UPLOAD_ERR_OK) {
                        $nombreArchivo = $archivos['name'][$i];
                        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                        $rutaDestino = $carpetaDestino . $nombreArchivo;

                        $rutafinal = '../documentosAlumnos/'.$curp.'/' . $nombreArchivo;

             
        
                        // Mueve el archivo a la carpeta de destino
                        if ( move_uploaded_file($archivos['tmp_name'][$i], $rutaDestino)) {

                            $query = "INSERT INTO documentosaspirantes (EstudianteId, TipoDocumentoId, Nombre, Ruta, Aprobado) VALUES ('$id', $i+1, '$nombreArchivo', '$rutafinal',0)
                            ON DUPLICATE KEY UPDATE Nombre = '$nombreArchivo', Ruta = '$rutafinal'";
                            

                            $query2 = "UPDATE documentosaspirantes  AS docasp
                            JOIN tipodocumento AS td ON docasp.TipoDocumentoId = td.id
                            SET docasp.NombreDocumento = td.Nombre 
                            WHERE docasp.EstudianteId  = '$id' AND docasp.TipoDocumentoId = td.Id ";

                            // die($query);    

                            $resultado = $this->conexion->prepare($query);
                            $resultado->execute();

                            $resultado2 = $this->conexion->prepare($query2);
                            $resultado2->execute();
                            
                            $_SESSION['DocumentosAlumno'] = false;
                            // echo "Archivo $i: '$nombreArchivo' se ha subido correctamente a: " . $rutaDestino . "<br>";
                            // echo "Extensión: " . $extension . "<br><br>";


                            echo'<script type="text/javascript">
                            alert("Documentos cargados correctamente.");
                            window.location.href="../../alumnos/perfil.php";
                            </script>';
                        } else {
                            echo'<script type="text/javascript">
                            alert("No se han enviado archivos.");
                            window.location.href="../../alumnos/documentos.php";
                            </script>';
                        }
                    }
                }
            } else {

                echo'<script type="text/javascript">
                            alert("No se han enviado archivos.");
                            window.location.href="../../alumnos/documentos.php";
                            </script>';
                

            }
        }
        

    }

    public function ObtenerAlumnos(){

        // Conecta a la base de datos (reemplaza con tus datos de conexión)


        // Prepara y ejecuta la consulta SQL
        $consulta = $this->conexion->prepare("SELECT folio, nombre, grado, id, ,status, fecha FROM aspirantes");
        $consulta->execute();

        // Obtiene los resultados y los formatea en formato JSON
        $users = $consulta->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($users);


    }

    public function EliminarDocumentoAlumno($AlumnoId, $tipo){

        // Conecta a la base de datos (reemplaza con tus datos de conexión)


        // Prepara y ejecuta la consulta SQL
        $query = "UPDATE documentosaspirantes SET Aprobado = NULL  WHERE EstudianteId ='$AlumnoId' AND TipoDocumentoId = '$tipo'";

        $consulta = $this->conexion->prepare($query);



        

        if ($consulta->execute()) {
            // Imprime un fragmento de JavaScript para mostrar una alerta

            echo'<script type="text/javascript">
                alert("El archivo ha sido eliminado.");
                window.location.href="../../admin/ver-documentos-alumno.php?id='.$AlumnoId.'";
                </script>';


            
        } else {
            // En caso de error, puedes mostrar una alerta de error

            echo'<script type="text/javascript">
                alert("Error al eliminar el archivo.");
                window.location.href="../../admin/ver-documentos-alumno.php?id='.$AlumnoId.'";
                </script>';

        }

    }

    public function EliminarAlumno($id){

        // Conecta a la base de datos (reemplaza con tus datos de conexión)


        // Prepara y ejecuta la consulta SQL        
        $query = "DELETE FROM aspirantes  WHERE id ='$id'";
        



        $consulta = $this->conexion->prepare($query);



        

        if ($consulta->execute()) {
            // Imprime un fragmento de JavaScript para mostrar una alerta

            echo'<script type="text/javascript">
                alert("El alumno seleccionado a sido eliminado.");
                window.location.href="../../admin/lista-alumnos.php";
                </script>';


            
        } else {
            // En caso de error, puedes mostrar una alerta de error

            echo'<script type="text/javascript">
                alert("Error al eliminar el alumno seleccionado.");
                window.location.href="../../admin/lista-alumnos.php";
                </script>';

        }

    }

    
    

}

