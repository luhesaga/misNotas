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
		$query ="SELECT nombre_materia, nombre_nota, nota
				FROM registro_nota
        inner join materia on  idMateria=materia.Id
        inner join notas on idNota=notas.Id
        inner join usuario on idUser=usuario.Id
        WHERE idUser = '".$user."'
				order by nombre_materia, nombre_nota";
		$result = mysqli_query($conex->conectar(),$query)or die(mysql_error());
		$query2 ="SELECT materia.Id, nombre_materia
				FROM materia
        inner join usuario on idUser=usuario.Id
        WHERE idUser = '".$user."'
				order by nombre_materia";
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
			$mat[$i]["materia"] =$info["nombre_materia"] ;
			$i++;
		}
		$i=1;
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
			$n1=$mat[$i]["nota1"];
			$n2=$mat[$i]["nota2"];
			$n3=$mat[$i]["nota3"];
			$n4=$mat[$i]["nota4"];
			$n5=$mat[$i]["nota5"];
			$n6=$mat[$i]["nota6"];
			$defin=((($n1*0.3)+($n2*0.7))*0.3)+((($n3*0.3)+($n4*0.7))*0.3)+((($n5*0.3)+($n6*0.7))*0.4);
			$mat[$i]["def"] =number_format((float)$defin, 2, '.', '');
			$i++;
		}
		// print_r($mat);
		$conex->desconectar();
		return json_encode($mat);
	}

}
?>
