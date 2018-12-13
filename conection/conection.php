<?php
class conection
{
	private $bd_host;
	private $bd_usuario;
	private $bd_contrasena;
	private $bd_base;


    public function conectar()
    {
      $this->bd_host = "localhost";
      $this->bd_usuario = "root";
      $this->bd_contrasena = "12345678";
      $this->bd_base = "misnotas";
      $this->conexion = mysqli_connect($this->bd_host, $this->bd_usuario, $this->bd_contrasena,$this->bd_base) or die (mysqli_error());
	  return $this->conexion;
    }

    public function desconectar()
    {
      mysqli_close($this->conexion);
    }
}

?>
