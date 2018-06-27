<?php @session_start();
/*//es necesario para poder iniciar sesion, se guardan las variables de login y lo hara disponible en todo el proyecto
//$con = new mysqli('localhost' , 'root' , 'Integrador69' , 'central');
//$con = new mysqli('localhost' , 'root' , '' , 'central');
//$salt = '$contraseña$/';
/*Orientados a objetos
$versionPHP = explode('.', phpversion());
$version = $versionPHP[0];
$subversion = $versionPHP[1];
$revision = $versionPHP[2];

class conexion
{
    public $cn;
    public $ultimoSql;
    // Recibe como argumento el $this->cn, si no crea uno nuevo.
	public function __construct($cnx = null)
	{
	  if ($cnx)
      {
        $this->cn = $cnx;
      } else {
        $this->conectar();
      }
	}
    public function conectar()
    {
      // $pMysqli = new mysqli('p:'.DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
      $this->cn = new mysqli('localhost', 'root', '', 'centralnuevo');

      if ($this->cn)
      {
        echo "Conexion a base realizada." . PHP_EOL;
        echo "(" . mysqli_connect_errno() . PHP_EOL . ")";
        echo ":<br>" . mysqli_connect_error() . PHP_EOL;
        die();
      }//Termina if
      elseif (!$this->cn)
      {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "(" . mysqli_connect_errno() . PHP_EOL . ")";
        echo ":<br>" . mysqli_connect_error() . PHP_EOL;
        die();
      }
      return $this->cn;

    }
    public function inserta($sql)
    {
        $resultado = $this->cn->query($sql);
        if ($resultado == false)
        {
          die('Error en:<br>'.$sql);
        }
        $this->ultimoSql = $datos;
        return $this->ultimoSql;
    }
    public function ejecuta($sql)
    {
      	$resultado = $this->cn->query($sql);
      	if ($resultado == false)
      	{
      		die('Error en:<br>'.$sql);
      	}
        // Se convierte en un array.
        $datos = array();
        while ($registro = $resultado->fetch_array())
        {
          $datos[] = $registro;
        }
        $resultado->close();
        $this->ultimoSql = $datos;
        return $this->ultimoSql;
    }
    public function consulta($sql)
    {
      $resultado = $this->cn->query($sql);
      if($resultado == false)
      {
        die("Error en:<br>".$sql);
      }//Termina if

      $sel = "SELECT * FROM Usuarios where bloqueo=1 OR bloqueo =0";

    }

}
$cnx = new conexion();
*/

/*
 //Conexion estructurada
*/
$hostname_localhost = 'localhost';
$database_localhost = 'zadmin_facturas';
$username = 'factua';
$password = 'nesepude6';
//error_reporting(0);
$localhost = mysql_connect($hostname_localhost, $username, $password) or trigger_error(mysqli_error(), E_USER_ERROR);
mysql_query("SET NAMES 'utf8'");
$coneccion = mysql_select_db($database_localhost, $localhost) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos".mysql_error());
if (!isset($localhost))
  {
    die("No se ha podido conectar a la BD: " . mysql_error());
  }

 ?>
