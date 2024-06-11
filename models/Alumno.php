<?php
include_once('db_connection.php');


class Alumno extends Connect {
    private $id;
    private $folio;
    private $curp;
    private $nombre;
    private $apellido;
    private $grado;
    private $fechaDeNacimiento;
    private $peso;
    private $lentes;
    private $cartilla;
    private $vacuna;
    private $ortopedico;
    private $sexo;
    private $nacionalidad;
    private $entidadDeNacimiento;
    private $domicilio;
    private $telefono;
    private $redSocial;
    private $nombreCuenta;
    private $correoElectronico;
    private $status;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFolio() {
        return $this->folio;
    }

    public function setFolio($folio) {
        $this->folio = $folio;
    }

    public function getCurp() {
        return $this->curp;
    }

    public function setCurp($curp) {
        $this->curp = $curp;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getGrado() {
        return $this->grado;
    }

    public function setGrado($grado) {
        $this->grado = $grado;
    }

    public function getFechaDeNacimiento() {
        return $this->fechaDeNacimiento;
    }

    public function setFechaDeNacimiento($fechaDeNacimiento) {
        $this->fechaDeNacimiento = $fechaDeNacimiento;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function getLentes() {
        return $this->lentes;
    }

    public function setLentes($lentes) {
        $this->lentes = $lentes;
    }

    public function getCartilla() {
        return $this->cartilla;
    }

    public function setCartilla($cartilla) {
        $this->cartilla = $cartilla;
    }

    public function getVacuna() {
        return $this->vacuna;
    }

    public function setVacuna($vacuna) {
        $this->vacuna = $vacuna;
    }

    public function getOrtopedico() {
        return $this->ortopedico;
    }

    public function setOrtopedico($ortopedico) {
        $this->ortopedico = $ortopedico;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getNacionalidad() {
        return $this->nacionalidad;
    }

    public function setNacionalidad($nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }

    public function getEntidadDeNacimiento() {
        return $this->entidadDeNacimiento;
    }

    public function setEntidadDeNacimiento($entidadDeNacimiento) {
        $this->entidadDeNacimiento = $entidadDeNacimiento;
    }

    public function getDomicilio() {
        return $this->domicilio;
    }

    public function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getRedSocial() {
        return $this->redSocial;
    }

    public function setRedSocial($redSocial) {
        $this->redSocial = $redSocial;
    }

    public function getNombreCuenta() {
        return $this->nombreCuenta;
    }

    public function setNombreCuenta($nombreCuenta) {
        $this->nombreCuenta = $nombreCuenta;
    }

    public function getCorreoElectronico() {
        return $this->correoElectronico;
    }

    public function setCorreoElectronico($correoElectronico) {
        $this->correoElectronico = $correoElectronico;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }


    
    // Método para validar el inicio de sesión
    public function validarInicioSesion($curp, $folio) {
        $curp = $this->conexion->real_escape_string($curp); // Evita SQL Injection
        $folio = $this->conexion->real_escape_string($folio); // Evita SQL Injection

        $query = "SELECT * FROM aspirantes WHERE curp = '$curp' AND folio = '$folio'";
        $resultado = $this->conexion->query($query);
        $dato = '';
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();

            $this->almacenarDatosEnSesion($fila);
            $this->validarAccesoDocumentos($fila['Id']);
            // Usuario válido
            return true;
        } else {
            // Usuario inválido
            return false;
        }
    }

    private function almacenarDatosEnSesion($fila) {
        $_SESSION['IdAlumno'] = $fila['Id'];
        $_SESSION['NombreAlumno'] = $fila['Nombre'];
        $_SESSION['GradoAlumno'] = $fila['Grado'];
        $_SESSION['ComentarioAlumno'] = $fila['Comentario'];
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
        if (isset($_SESSION['curpAlumno'])) {
            // Borra todas las variables de sesión
            $_SESSION = array();

            // Invalida la cookie de sesión actual (si existe)
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time() - 3600, '/');
            }

            // Destruye la sesión
            session_destroy();

            // Redirige a la página de inicio de sesión o a donde desees
            header('Location: ../../alumnos/iniciar-sesion.html');
        } else {
            // Si el usuario no estaba autenticado, redirige a una página de inicio de sesión
            header('Location: ../../alumnos/iniciar-sesion.html');
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
        $alumnos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($alumnos);


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


?>