<?php
session_start();
require_once("conection/conection.php");
class materia
{
	private $Id;
	private $nombre_materia;
	private $IdUser;

	function __construct()
	{

	}
	public function setId($Id)
	{
		$this->Id=$Id;
	}
	public function getId()
	{
		return $this->Id;
	}

	public function setNombre($nombre_materia)
	{
		$this->nombre_materia=$nombre_materia;
	}
	public function getNombre()
	{
		return $this->nombre_materia;
	}

	public function setIdUser($IdUser)
	{
		$this->IdUser=$IdUser;
	}
  public function getIdUser()
  {
    return $this->IdUser;
  }

  function consultaMat($correo, $clave){
			$conex=new conection();
			//$usu = null;
			$query ="SELECT Id, nombre_materia, IdUser
					FROM materia WHERE IdUser = '".$_SESSION["IdUsuario"]."'";
			$result = mysqli_query($conex->conectar(),$query)or die(mysql_error());
      echo $query;
			while ($row =  mysqli_fetch_row($result))
			{
				$mat= new materia();
				$mat->setId($row[0]);
				$mat->setNombre($row[1]);
				$mat->setIdUser($row[2]);


			}
			$conex->desconectar();
			return $mat;
		}

  function crearMat($nombre_materia){
			$conex = new conection();
			$query = "INSERT INTO materia (nombre_materia,IdUser)".
			"VALUES('".$nombre_materia."','".$_SESSION["IdUsuario"]."')";
      echo $query;
			$result = mysqli_query($conex->conectar(),$query);

			return $result;
		}
}
?>
