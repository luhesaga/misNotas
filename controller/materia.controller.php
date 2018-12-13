<?php
session_start();
require_once("model/materia.php");
$matd = new materia();
$mat = $matd->crearMat($_POST["nombreMat"]);
	if($mat!=null)
	{

				header("Location: ?vista=verNotas");






	}

 ?>
