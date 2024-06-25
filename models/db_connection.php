<?php
class Connect
{
    // //Colocar datos correctos del servidor.
    // private static $db_host = 'sql308.infinityfree.com';
    // private static $db_user = 'if0_36674979';
    // private static $db_pass = '00BhXW8U1BS';
    // private static $db_name = 'if0_36674979_secundar_sige';
    
    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = '';
    private static $db_name = 'tgarcia';


    private static $db_charset = 'utf8';
    private $conn;
    public $conexion;
    protected $query;
    protected $rows = array();

    public function __construct()
    {
        $this->conectarBaseDeDatos();
        $this->conn = new PDO('mysql:host=' . self::$db_host . '; dbname=' . self::$db_name, self::$db_user, self::$db_pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function conectarBaseDeDatos() {
       

        $this->conexion = new mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db_name);

        if ($this->conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conexion->connect_error);
        }
    }

    //TRAER RESULTADOS DE UNA CONSULTA DE TIPO SELECT EN UN ARRAY
    public function get_query($query)
    {
        return $this->conn->prepare($query);
    }


    public function __destruct()
    {
        $this->conn = null;
    }
}
