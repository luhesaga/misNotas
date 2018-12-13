<?php
session_start();
require_once("conection/conection.php");
class registro
{
	private $idMateria;
	private $idNota;
	private $nota;

	function __construct()
	{

	}
	public function setIdMat($idMateria)
	{
		$this->idMateria=$idMateria;
	}
	public function getIdMat()
	{
		return $this->idMateria;
	}

	public function setIdNota($IdNota)
	{
		$this->IdNota=$IdNota;
	}
	public function getIdNota()
	{
		return $this->IdNota;
	}

	public function setNota($nota)
	{
		$this->nota=$nota;
	}
  public function getNota()
  {
    return $this->nota;
  }

  function listaNot($user){
			$conex=new conection();
			//$usu = null;
			$query ="SELECT nombre_materia, nombre_nota, nota
					FROM registro_nota
          inner join materia on  idMateria=materia.Id
          inner join notas on idNota=notas.Id
          inner join usuario on idUser=usuario.Id
          WHERE idUser = '".$user."'
					order by nombre_materia, nombre_nota";
			$result = mysqli_query($conex->conectar(),$query)or die(mysql_error());
			// echo $query;
			$query2 ="SELECT materia.Id, nombre_materia
					FROM materia
          inner join usuario on idUser=usuario.Id
          WHERE idUser = '".$user."'
					order by nombre_materia";
					// print_r($query2);
			$result2 = mysqli_query($conex->conectar(),$query2)or die(mysql_error());

      $materia= array();
			$notas=array();
			$i=0;
			$j=0;
			while ($row =  mysqli_fetch_assoc($result2))
			{
				$materia[$i] = $row;
						$i++;
      }
			while ($row =  mysqli_fetch_assoc($result))
			{
				$notas[$j] = $row;
						$j++;
      }
			$i=1;
			$mat=array();
			foreach($materia as $info){
					//echo $info["nombre_materia"] ;
					$mat[$i]["materia"] =$info["nombre_materia"] ;
					$i++;
			}
			$i=0;

			foreach ($mat as $key) {
				$j=1;
				foreach ($notas as $value) {
					if ($value["nombre_materia"]==$key["materia"]) {
						$mat[$i]["nota".$j] =$value["nota"] ;

						$j++;
					}
				}
				for ($t=$j; $t <=6 ; $t++) {
					$mat[$i]["nota".$t] =0.0 ;
				}
				$i++;
			}
			// var_dump($mat);

			$conex->desconectar();
			return json_encode($mat);
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
