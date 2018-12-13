<?php
require_once("conection/conection.php");
class usuario
{
	private $Id;
	private $nombre;
	private $apellido;
	private $correo;
	private $clave;

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

	public function setNombre($nombre)
	{
		$this->nombre=$nombre;
	}
	public function getNombre()
	{
		return $this->nombre;
	}

	public function setApellido($apellido)
	{
		$this->apellido=$apellido;
	}
	public function getApellido()
	{
		return $this->apellido;
	}

	public function setCorreo($correo)
	{
		$this->correo=$correo;
	}
	public function getCorreo()
	{
		return $this->correo;
	}

	public function setClave($clave)
	{
		$this->clave=$clave;
	}
	public function getClave()
	{
		return $this->clave;
	}

  function consultaUser($correo, $clave)
		{
			$conex=new conection();
			//$usu = null;
			$query ="SELECT Id, nombre, apellido, correo, clave
					FROM usuario WHERE correo = '".$correo."' and clave = '".$clave."'";
			$result = mysqli_query($conex->conectar(),$query)or die(mysql_error());
      echo $query;
			while ($row =  mysqli_fetch_row($result))
			{
				$usu= new usuario();
				$usu->setId($row[0]);
				$usu->setNombre($row[1]);
				$usu->setApellido($row[2]);
				$usu->setCorreo($row[3]);
				$usu->setClave($row[4]);

			}
			$conex->desconectar();
			return $usu;
		}


}
?>
