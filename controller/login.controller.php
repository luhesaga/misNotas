<?php
session_start();
require_once("model/usuario.php");
$userd = new usuario();
	$usu = $userd->consultaUser($_POST["correo"], $_POST['clave']);
	if($usu!=null)
	{
			$_SESSION["login"]="ok";
			$_SESSION["IdUsuario"]= $usu->getId();
			$_SESSION["loginName"]= $usu->getNombre();
      $_SESSION["loginLastName"]= $usu->getApellido();
			$_SESSION["mailUser"] = $usu->getCorreo();
			$_SESSION["pass"] = $usu->getClave();

				header("Location: ?vista=verNotas");






	}else
	{
	  echo "<script>swal('Ha ocurrido un error!', 'Verifique el id del usuario o la contraseña!', 'error')</script>";
		//header("Location: index.php?vista=Login");

	}

 ?>
