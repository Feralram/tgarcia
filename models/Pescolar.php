<?php
include_once('db_connection.php');

class Pescolar extends Connect {
    private $id;
    private $nombre;
    private $correo;
    private $rfc;
    private $puesto;
    private $password;
    private $fechadenacimiento;
    private $edad;
    private $nacionalidad;
    private $entidaddenacimiento;
    private $sexo;
    private $curp;
    private $estadocivil;
    private $domicilio;
    private $celular;
    private $telefono;
    private $fecha;
    private $status;

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

    public function getCorreoElectronico() {
        return $this->correo;
    }

    public function setCorreoElectronico($correo) {
        $this->correo = $correo;
    }

    public function getRfc() {
        return $this->rfc;
    }

    public function setRfc($rfc) {
        $this->rfc = $rfc;
    }

    public function getPuesto() {
        return $this->puesto;
    }

    public function setPuesto($puesto) {
        $this->puesto = $puesto;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getFechaDeNacimiento() {
        return $this->fechadenacimiento;
    }

    public function setFechaDeNacimiento($fechaDeNacimiento) {
        $this->fechaDeNacimiento = $fechaDeNacimiento;
    }
    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }
    
    public function getNacionalidad() {
        return $this->nacionalidad;
    }

    public function setNacionalidad($nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }
    
    public function getEntidadDeNacimiento() {
        return $this->entidaddenacimiento;
    }

    public function setEntidadDeNacimiento($entidaddenacimiento) {
        $this->entidaddenacimiento = $entidaddenacimiento;
    }
    
    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getCurp() {
        return $this->curp;
    }

    public function setCurp($curp) {
        $this->curp = $curp;
    }

    public function getEstadocivil() {
        return $this->estadocivil;
    }

    public function setEstadocivil($estadocivil) {
        $this->estadocivil = $estadocivil;
    }

    public function getDomicilio() {
        return $this->domicilio;
    }

    public function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }
    public function getCelular() {
        return $this->celular;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }



    
    // Método para validar el inicio de sesión
    public function validarInicioSesion($correo, $password) {
        $correo = $this->conexion->real_escape_string($correo); // Evita SQL Injection
        $password = $this->conexion->real_escape_string($password); // Evita SQL Injection
        $query = "SELECT * FROM trabajadores WHERE correo = '$correo'";
        $resultado = $this->conexion->query($query);

        if ($resultado->num_rows == 0) {
            //Usuario no encontrado
            return false;
        }
            $fila = $resultado->fetch_assoc();
            $hash = $fila['Password'];
            if(!password_verify($password, $hash)){
                //Contraseña no valida
                return false;
            }
            $id = $fila['Id'];
            $name = $fila['Nombre'];
            $email = $fila['Correo'];
            $jobPosition = $fila['Puesto'];
            $_SESSION['IdPescolar'] = $id;
            $_SESSION['NombrePescolar'] = $name;
            $_SESSION['correoPescolar'] = $email;
            $_SESSION['PuestoPescolar'] = $jobPosition;
            $_SESSION['ComentarioPescolar'] = $fila['Comentario'];

            // Usuario válido
            return true;
    }

    public function actualizarDatos($id, $fechadenacimiento, $edad, $nacionalidad, $entidaddenacimiento, $sexo, $curp, $estadocivil, $domicilio, $celular, $telefono) {

        //Alumno

        $id = $this->conexion->real_escape_string($id); // Evita SQL Injection                                        
       //$nombre = $this->conexion->real_escape_string($nombre); // Evita SQL Injection
        //$grado = $this->conexion->real_escape_string($grado); // Evita SQL Injection
        $fechadenacimiento = $this->conexion->real_escape_string($fechadenacimiento); // Evita SQL Injection
        $edad = $this->conexion->real_escape_string($edad); // Evita SQL Injection
        $nacionalidad = $this->conexion->real_escape_string($nacionalidad); // Evita SQL Injection
        $entidaddenacimiento = $this->conexion->real_escape_string($entidaddenacimiento); // Evita SQL Injection
        $sexo = $this->conexion->real_escape_string($sexo); // Evita SQL Injection
        $curp = $this->conexion->real_escape_string($curp); // Evita SQL Injection
        $estadocivil = $this->conexion->real_escape_string($estadocivil); // Evita SQL Injection
        $domicilio = $this->conexion->real_escape_string($domicilio); // Evita SQL Injection
        $celular = $this->conexion->real_escape_string($celular); // Evita SQL Injection
        $telefono = $this->conexion->real_escape_string($telefono); // Evita SQL Injection

 

        

        $query = 
        "UPDATE trabajadores 
        SET FechaDeNacimiento='$fechadenacimiento', Edad='$edad',Nacionalidad='$nacionalidad', EntidadDeNacimiento='$entidaddenacimiento', Sexo='$sexo',
        Curp='$curp', Direccion='$domicilio', EstadoCivil='$estadocivil', Celular='$celular', Telefono='$telefono', Fecha= NOW(), Comentario='None'
        WHERE Id = '$id' ";


    

        //die($query);

        
        $resultado1 = $this->conexion->prepare($query);


        

        if ($resultado1->execute()) {
            // Imprime un fragmento de JavaScript para mostrar una alerta
            $_SESSION['ComentarioPescolar'] = 'None';
            echo'<script type="text/javascript">
                alert("Los datos se han actualizado correctamente.");
                window.location.href="../../personal-escolar/documentos.php";
                </script>';

        } else {
            // En caso de error, puedes mostrar una alerta de error
            
            echo'<script type="text/javascript">
                alert("Los datos se han actualizado correctamente.");
                window.location.href="../../personal-escolar/perfil.php";
                </script>';

        }


    }


    public function documentosPersonal($id){

        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Carpeta de destino (ajusta la ruta según tu configuración)
            $carpetaDestino = '../../documentosPersonal/' . $id . "/";

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

                        $rutafinal = '../documentosPersonal/'.$id.'/' . $nombreArchivo;

             
        
                        // Mueve el archivo a la carpeta de destino
                        if ( move_uploaded_file($archivos['tmp_name'][$i], $rutaDestino)) {

                            $query = "INSERT INTO documentostrabajadores (Id,TrabajadorId, TipoDocumentoId, Nombre, Ruta) VALUES (UUID(),'$id', $i+1, '$nombreArchivo', '$rutafinal')";

                            // die($query);    
                            
                            $resultado = $this->conexion->prepare($query);
                            $resultado->execute();

                            // echo "Archivo $i: '$nombreArchivo' se ha subido correctamente a: " . $rutaDestino . "<br>";
                            // echo "Extensión: " . $extension . "<br><br>";

                            echo'<script type="text/javascript">
                            alert("Documentos cargados correctamente.");
                            window.location.href="../../personal-escolar/documentos.php";
                            </script>';

                        } else {
                            echo "Error al subir el archivo '$nombreArchivo'.<br>";
                            echo'<script type="text/javascript">
                            alert("No se han enviado archivos.");
                            window.location.href="../../personal-escolar/documentos.php";
                            </script>';
                        }
                    }
                }
            } else {
                echo'<script type="text/javascript">
                    alert("No se han enviado archivos.");
                    window.location.href="../../personal-escolar/documentos.php";
                    </script>';

            }
        }
        

    }

    public function DocumentosActualizables($id){

        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Carpeta de destino (ajusta la ruta según tu configuración)
            $carpetaDestino = '../../documentosPersonal/' . $id . "/";

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
                for ($i = 8; $i < 15; $i++) {
                    if ($archivos['error'][$i] === UPLOAD_ERR_OK) {
                        $nombreArchivo = $archivos['name'][$i];
                        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                        $rutaDestino = $carpetaDestino . $nombreArchivo;

                        $rutafinal = '../documentosPersonal/'.$id.'/' . $nombreArchivo;

             
        
                        // Mueve el archivo a la carpeta de destino
                        if ( move_uploaded_file($archivos['tmp_name'][$i], $rutaDestino)) {

                            $query = "INSERT INTO documentostrabajadores (Id, TrabajadorId, TipoDocumentoId, Nombre, Ruta, Aprobado) VALUES (UUID(),'$id', $i+1, '$nombreArchivo', '$rutafinal',0)";

                            // die($query);    
                            
                            $resultado = $this->conexion->prepare($query);
                            $resultado->execute();

                            // echo "Archivo $i: '$nombreArchivo' se ha subido correctamente a: " . $rutaDestino . "<br>";
                            // echo "Extensión: " . $extension . "<br><br>";

                            echo'<script type="text/javascript">
                            alert("Documentos cargados correctamente.");
                            window.location.href="../../personal-escolar/documentos.php";
                            </script>';

                        } else {
                            echo "Error al subir el archivo '$nombreArchivo'.<br>";
                            echo'<script type="text/javascript">
                            alert("No se han enviado archivos.");
                            window.location.href="../../personal-escolar/documentos.php";
                            </script>';
                        }
                    }
                }
            } else {
                echo'<script type="text/javascript">
                    alert("No se han enviado archivos.");
                    window.location.href="../../personal-escolar/documentos.php";
                    </script>';

            }
        }
        

    }




    public function CerrarSesion(){
                // Lógica para cerrar la sesión (por ejemplo, cuando el usuario hace clic en "Cerrar sesión")
        if (isset($_SESSION['correoPescolar'])) {
            // Borra todas las variables de sesión
            $_SESSION = array();

            // Invalida la cookie de sesión actual (si existe)
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time() - 3600, '/');
            }

            // Destruye la sesión
            session_destroy();

            // Redirige a la página de inicio de sesión o a donde desees
            header('Location: ../../personal-escolar/iniciar-sesion.html');
        } else {
            // Si el usuario no estaba autenticado, redirige a una página de inicio de sesión
            header('Location: ../../personal-escolar/iniciar-sesion.html');
        }
    }


    public function EliminarDocumentoPersonal($pescolarId,$id){

        // Conecta a la base de datos (reemplaza con tus datos de conexión)


        // Prepara y ejecuta la consulta SQL        
        $query = "UPDATE documentostrabajadores SET Aprobado = NULL  WHERE id ='$id'";


        $consulta = $this->conexion->prepare($query);



        

        if ($consulta->execute()) {
            // Imprime un fragmento de JavaScript para mostrar una alerta

            echo'<script type="text/javascript">
                alert("El archivo ha sido eliminado.");
                window.location.href="../../admin/ver-documentos-personal.php?id='.$pescolarId.'";
                </script>';


            
        } else {
            // En caso de error, puedes mostrar una alerta de error

            echo'<script type="text/javascript">
                alert("Error al eliminar el archivo.");
                window.location.href="../../admin/ver-documentos-personal.php?id='.$pescolarId.'";
                </script>';

        }

    }
    
    public function EliminarPersonal($id){

        // Conecta a la base de datos (reemplaza con tus datos de conexión)


        // Prepara y ejecuta la consulta SQL        
        $query = "DELETE FROM trabajadores  WHERE id ='$id'";


        $consulta = $this->conexion->prepare($query);



        

        if ($consulta->execute()) {
            // Imprime un fragmento de JavaScript para mostrar una alerta

            echo'<script type="text/javascript">
                alert("El personal seleccionado a sido eliminado.");
                window.location.href="../../admin/lista-personal-escolar.php";
                </script>';


            
        } else {
            // En caso de error, puedes mostrar una alerta de error

            echo'<script type="text/javascript">
                alert("Error al eliminar el personal seleccionado.");
                window.location.href="../../admin/lista-personal-escolar.php";
                </script>';

        }

    }
    

}


?>